<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductColor;
use App\Models\ProductTab;
use App\Models\ProductTabRow;
use App\Models\ProductPrice;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\FreightEstimateMail;
use Illuminate\Support\Facades\Log;
class HomeController extends Controller
{

    public function index()
    {
        $newProducts = Product::with(['images', 'colors', 'tabs'])
            ->latest()
            ->take(5)
            ->get();
        // Special Offer Products
        $products = Product::with(['images', 'colors', 'tabs'])
            ->where('is_special_offer', 1)
            ->whereNotNull('special_price_before')
            ->whereNotNull('special_price_after')
            ->take(12)
            ->get();

        // Popular Products
        $popularProducts = Product::with(['images', 'colors', 'tabs'])
            ->where('is_popular', 1)
            ->take(12)
            ->get();

        return view('frontend.index', compact('newProducts', 'products', 'popularProducts'));
    }
    public function about()
    {

        return view('frontend.about');
    }

    public function terms()
    {

        return view('frontend.terms');
    }

    public function product(Request $request)
    {
        $query = Product::query()
            ->with(['images', 'colors', 'category'])
            ->select('products.*');

        // 🔍 Search
        if ($request->filled('q')) {
            $query->where('name', 'LIKE', '%' . $request->q . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        } elseif ($request->filled('category')) {
            $category = Category::where('slug', $request->category)
                ->orWhere('name', $request->category)
                ->first();

            if ($category) {
                $query->where('category_id', $category->id);
            } else {
                $query->whereRaw('0 = 1'); // empty collection if no match
            }
        }

        // 🎨 Color filter
        if ($request->filled('colors')) {

            $selectedColors = collect(explode(',', $request->colors))
                ->map(fn($c) => strtolower(trim($c)))
                ->unique()
                ->toArray();

            $query->whereHas('colors', function ($q) use ($selectedColors) {
                $q->whereIn(DB::raw('LOWER(color_name)'), $selectedColors);
            });
        }

        // ✅ Pagination
        $products = $query->paginate(9)->withQueryString();

        // 📂 All parent categories with subcategories
        $categories = Category::with('subcategories')
            ->whereNull('parent_id')
            ->get();

        // 🎨 Colors
        $colors = ProductColor::select('color_name', DB::raw('MIN(color_code) as color_code'))
            ->groupBy('color_name')
            ->orderBy('color_name')
            ->get();

        return view('frontend.product', compact('products', 'categories', 'colors'));
    }



    public function detail($id)
    {
        $product = Product::with([
            'category',
            'images',
            'colors',
            'tabs.rows.cells',
        ])->findOrFail($id);

        $category = $product->category;


        if ($category->parent_id !== null) {
            $relatedProducts = Product::where('category_id', $category->id)
                ->where('id', '!=', $product->id)
                ->take(8)
                ->get();
        } else {

            $relatedProducts = collect();
        }

        return view('frontend.detail', compact('product', 'relatedProducts'));
    }


    public function downloadAllImages($id)
    {
        $product = Product::with(['images', 'colors'])->findOrFail($id);

        $zip = new ZipArchive;
        $zipFileName = 'product-' . $product->id . '-images.zip';
        $zipPath = storage_path('app/public/' . $zipFileName);

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {

            foreach ($product->images as $img) {
                $filePath = storage_path('app/public/' . $img->image_path);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, 'main/' . basename($filePath));
                }
            }

            foreach ($product->colors as $color) {
                $filePath = storage_path('app/public/' . $color->color_image);
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, 'colors/' . basename($filePath));
                }
            }

            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }


    public function downloadSingleImage($id)
    {
        // Try ProductImage first
        $image = ProductImage::find($id);
        $path = null;

        if ($image) {
            $path = $image->image_path;
        } else {
            // Try ProductColor
            $color = ProductColor::findOrFail($id);
            $path = $color->color_image;
        }

        $filePath = storage_path('app/public/' . $path);

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath);
    }

    public function submitEstimate(Request $request)
    {
        Log::info('submitEstimate endpoint hit', ['all' => $request->all()]);

        $data = $request->validate([
            'quantity' => 'required|integer',
            'user_email' => 'required|email',
            'country' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
            'residential' => 'nullable|string',
            'product_id' => 'required|integer',

        ]);


        try {
            Log::info('submitEstimate called', $data);

            // Fetch product with images
            $product = Product::with('images')->find($data['product_id']);

            if (!$product) {
                Log::error('Product not found', ['product_id' => $data['product_id']]);
                return back()->with('error', 'Product not found.');
            }

            // Add item number
            $data['item_number'] = $product->item_number ?? 'N/A';
            $data['user_email'];
            // ✅ Add item name
            $data['item_name'] = $product->name ?? 'N/A';

            if (!$product->item_number) {
                Log::warning('Product item_number is null', ['product_id' => $product->id]);
            }

            // Get first product image
            $thumbnailPath = $product->images->first()?->image_path;

            if (!$thumbnailPath) {
                Log::warning('Thumbnail path is null', ['product_id' => $product->id]);
            }

            Log::info('Sending freight email', [
                'product_id' => $product->id,
                'item_number' => $data['item_number'],
                'thumbnailPath' => $thumbnailPath,
            ]);

            Mail::to('mhuzaifa05302@gmail.com')
                ->send(new FreightEstimateMail($data, $thumbnailPath));

            Log::info('Freight email sent successfully');

            return back()->with('success', 'Freight estimate request sent successfully!');
        } catch (\Exception $e) {
            Log::error('Freight email failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Failed to send email.');
        }
    }

    public function downloadSingleTemplate($colorId)
    {
        $color = ProductColor::findOrFail($colorId);

        if (!$color->color_template_pdf) {
            abort(404, 'Template not found');
        }

        $filePath = storage_path('app/public/' . $color->color_template_pdf);

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath);
    }
    public function downloadAllTemplates($productId)
    {
        $product = Product::with('colors')->findOrFail($productId);

        $zip = new \ZipArchive;
        $zipName = 'product-' . $product->id . '-color-templates.zip';
        $zipPath = storage_path('app/public/' . $zipName);

        if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE)) {

            foreach ($product->colors as $color) {
                if (!$color->color_template_pdf)
                    continue;

                $filePath = storage_path('app/public/' . $color->color_template_pdf);

                if (file_exists($filePath)) {
                    $zip->addFile(
                        $filePath,
                        $color->color_name . '.pdf'
                    );
                }
            }

            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
    public function downloadBwTemplate($productId)
    {
        $product = Product::findOrFail($productId);

        if (!$product->bw_template_pdf) {
            abort(404, 'Black & White template not found');
        }

        $filePath = storage_path('app/public/' . $product->bw_template_pdf);

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath);
    }


}
