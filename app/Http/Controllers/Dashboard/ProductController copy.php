<?php
namespace App\Http\Controllers\Dashboard;

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
use Illuminate\Support\Facades\Storage;
use App\Models\ProductTabCell;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(20);
        return view('dashboard.pages.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.pages.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $bwTemplatePath = null;
            if ($request->hasFile('bw_template_pdf')) {
                $bwTemplatePath = $request->file('bw_template_pdf')
                    ->store('bw_templates', 'public');
            }

            $product = Product::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'item_number' => $request->item_number,
                'description' => $request->description,
                'material' => $request->material,
                'item_size' => $request->item_size,
                'imprint_area' => $request->imprint_area,
                'bw_template_pdf' => $bwTemplatePath,
            ]);
            // ✔ Save colors
            // ✔ Save colors
            if ($request->colors) {
                foreach ($request->colors as $index => $colorCode) {

                    // Color Image
                    $colorImage = null;
                    if ($request->color_images[$index] ?? false) {
                        $colorImage = $request->color_images[$index]
                            ->store('color_images', 'public');
                    }

                    // Color Template PDF
                    $colorTemplate = null;
                    if ($request->color_templates[$index] ?? false) {
                        $colorTemplate = $request->color_templates[$index]
                            ->store('color_templates', 'public');
                    }

                    ProductColor::create([
                        'product_id' => $product->id,
                        'color_name' => $request->color_names[$index] ?? null,
                        'color_code' => $colorCode,
                        'color_image' => $colorImage,
                        'color_template_pdf' => $colorTemplate,
                    ]);
                }
            }


            // ✔ Save product images
            if ($request->product_images) {
                foreach ($request->product_images as $image) {
                    $path = $image->store('product_images', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path
                    ]);
                }
            }

            // ✔ Save tabs and rows
            // ✔ Save tabs, rows, and cells
            // Example for top tabs
            if ($request->top_tabs) {
                foreach ($request->top_tabs as $tabIndex => $tabTitle) {
                    $tab = ProductTab::create([
                        'product_id' => $product->id,
                        'title' => $tabTitle,
                        'section' => 'top',
                    ]);

                    foreach ($request->top_tab_rows[$tabIndex] ?? [] as $rowIndex => $row) {
                        $tabRow = ProductTabRow::create([
                            'tab_id' => $tab->id,
                            'label' => $row['label'],
                            'value' => null
                        ]);

                        foreach ($row['cells'] ?? [] as $colName => $cellValue) {
                            ProductTabCell::create([
                                'row_id' => $tabRow->id,
                                'column_name' => $colName,
                                'value' => $cellValue
                            ]);
                        }
                    }
                }
            }

            // Example for bottom tabs
            if ($request->bottom_tabs) {
                foreach ($request->bottom_tabs as $tabIndex => $tabTitle) {
                    $tab = ProductTab::create([
                        'product_id' => $product->id,
                        'title' => $tabTitle,
                        'section' => 'bottom',
                    ]);

                    foreach ($request->bottom_tab_rows[$tabIndex] ?? [] as $rowIndex => $row) {
                        $tabRow = ProductTabRow::create([
                            'tab_id' => $tab->id,
                            'label' => $row['label'],
                            'value' => null
                        ]);

                        foreach ($row['cells'] ?? [] as $colName => $cellValue) {
                            ProductTabCell::create([
                                'row_id' => $tabRow->id,
                                'column_name' => $colName,
                                'value' => $cellValue
                            ]);
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product created successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', $e->getMessage());
        }
    }
    public function showDetail(Request $request, $id)
    {
        $product = Product::with([
            'category',
            'images',
            'colors',
            'tabs.rows.cells',
            'prices'
        ])->findOrFail($id);

        // Return partial view for modal
        return view('dashboard.pages.partial.product_detail_modal', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::with([
            'colors',
            'images',
            'tabs.rows.cells'
        ])->findOrFail($id);

        $categories = Category::all();

        return view('dashboard.pages.products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $product = Product::findOrFail($id);

            // Update product basic info
            $data = $request->only([
                'category_id',
                'name',
                'item_number',
                'description',
                'material',
                'item_size',
                'imprint_area'
            ]);

            // Add BW template if uploaded
            if ($request->hasFile('bw_template_pdf')) {
                $data['bw_template_pdf'] = $request->file('bw_template_pdf')->store('bw_templates', 'public');
            }

            // Update existing Color Templates
            if ($request->old_color_templates) {
                foreach ($request->old_color_templates as $colorId => $file) {
                    $color = ProductColor::find($colorId);
                    if ($color && $file) {
                        $color->color_template_pdf = $file->store('color_templates', 'public');
                        $color->save();
                    }
                }
            }

            // --------------------------
            // UPDATE OLD COLORS
            // --------------------------
            if ($request->old_colors) {
                foreach ($request->old_colors as $colorId => $colorCode) {
                    $color = ProductColor::find($colorId);
                    if (!$color)
                        continue;

                    $color->color_name = $request->old_color_names[$colorId] ?? $color->color_name;
                    $color->color_code = $colorCode;

                    if ($request->old_color_images[$colorId] ?? false) {
                        $color->color_image = $request->old_color_images[$colorId]
                            ->store('color_images', 'public');
                    }

                    $color->save();
                }
            }


            // --------------------------
            // ADD NEW COLORS
            // --------------------------
            if ($request->colors) {
                foreach ($request->colors as $index => $colorCode) {

                    // Color Image
                    $colorImage = null;
                    if ($request->color_images[$index] ?? false) {
                        $colorImage = $request->color_images[$index]->store('color_images', 'public');
                    }

                    // Color Template PDF
                    $colorTemplate = null;
                    if ($request->color_templates[$index] ?? false) {
                        $colorTemplate = $request->color_templates[$index]->store('color_templates', 'public');
                    }

                    ProductColor::create([
                        'product_id' => $product->id,
                        'color_name' => $request->color_names[$index] ?? null,
                        'color_code' => $colorCode,
                        'color_image' => $colorImage,
                        'color_template_pdf' => $colorTemplate, // ← new field
                    ]);
                }
            }


            // --------------------------
            // ADD NEW IMAGES
            // --------------------------
            if ($request->product_images) {
                foreach ($request->product_images as $image) {
                    $path = $image->store('product_images', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path
                    ]);
                }
            }

            // --------------------------
            // UPDATE EXISTING TOP TABS
            // --------------------------
            if ($request->old_top_tabs) {
                foreach ($request->old_top_tabs as $tabId => $title) {
                    $tab = ProductTab::find($tabId);
                    if (!$tab)
                        continue;

                    $tab->title = $title;
                    $tab->save();

                    // Update existing rows
                    foreach ($request->old_top_tab_rows[$tabId] ?? [] as $rowId => $rowData) {
                        $row = ProductTabRow::find($rowId);
                        if (!$row)
                            continue;

                        $row->label = $rowData['label'] ?? '';
                        $row->save();

                        // Update existing cells + create new columns
                        // Update existing cells + create new columns
                        // For existing cells
                        foreach ($request->old_top_tab_cells[$tabId][$rowId] ?? [] as $cellId => $value) {
                            $cell = ProductTabCell::find($cellId);
                            if ($cell) {
                                $cell->value = $value;
                                $cell->save();
                            }
                        }

                        // For new columns
                        foreach ($request->new_top_tab_cells[$tabId][$rowId] ?? [] as $value) {
                            $maxColumn = $row->cells()->max('column_name') ?? -1;
                            ProductTabCell::create([
                                'row_id' => $row->id,
                                'column_name' => $maxColumn + 1,
                                'value' => $value
                            ]);
                        }

                    }

                    // Add new rows in existing tab
                    foreach ($request->new_top_tab_rows[$tabId] ?? [] as $rowIndex => $rowData) {
                        $newRow = ProductTabRow::create([
                            'tab_id' => $tab->id,
                            'label' => $rowData['label'] ?? '',
                            'value' => null
                        ]);

                        foreach ($rowData['cells'] ?? [] as $colIndex => $cellValue) {
                            ProductTabCell::create([
                                'row_id' => $newRow->id,
                                'column_name' => $colIndex,
                                'value' => $cellValue
                            ]);
                        }
                    }
                }
            }

            // --------------------------
            // UPDATE EXISTING BOTTOM TABS
            // --------------------------
            if ($request->old_bottom_tabs) {
                foreach ($request->old_bottom_tabs as $tabId => $title) {
                    $tab = ProductTab::find($tabId);
                    if (!$tab)
                        continue;

                    $tab->title = $title;
                    $tab->save();

                    // Update existing rows
                    foreach ($request->old_bottom_tab_rows[$tabId] ?? [] as $rowId => $rowData) {
                        $row = ProductTabRow::find($rowId);
                        if (!$row)
                            continue;

                        $row->label = $rowData['label'] ?? '';
                        $row->save();

                        // Update existing cells + create new columns
                        foreach ($request->old_bottom_tab_cells[$tabId][$rowId] ?? [] as $colIndex => $value) {
                            $cell = ProductTabCell::where('row_id', $row->id)
                                ->where('column_name', $colIndex)
                                ->first();
                            if ($cell) {
                                $cell->value = $value;
                                $cell->save();
                            } else {
                                ProductTabCell::create([
                                    'row_id' => $row->id,
                                    'column_name' => $colIndex,
                                    'value' => $value
                                ]);
                            }
                        }
                    }

                    // Add new rows in existing bottom tab
                    foreach ($request->new_bottom_tab_rows[$tabId] ?? [] as $rowIndex => $rowData) {
                        $newRow = ProductTabRow::create([
                            'tab_id' => $tab->id,
                            'label' => $rowData['label'] ?? '',
                            'value' => null
                        ]);

                        foreach ($rowData['cells'] ?? [] as $colIndex => $cellValue) {
                            ProductTabCell::create([
                                'row_id' => $newRow->id,
                                'column_name' => $colIndex,
                                'value' => $cellValue
                            ]);
                        }
                    }
                }
            }

            // --------------------------
            // ADD NEW TOP TABS
            // --------------------------
            // ADD NEW TOP TABS
            if ($request->top_tabs) {
                foreach ($request->top_tabs as $tabIndex => $tabData) {
                    $tab = ProductTab::create([
                        'product_id' => $product->id,
                        'title' => $tabData['title'] ?? '', // <- Use the 'title' key
                        'section' => 'top'
                    ]);

                    foreach ($tabData['rows'] ?? [] as $rowIndex => $rowData) {
                        $row = ProductTabRow::create([
                            'tab_id' => $tab->id,
                            'label' => $rowData['label'] ?? '',
                            'value' => null
                        ]);

                        foreach ($rowData['cells'] ?? [] as $colIndex => $cellValue) {
                            ProductTabCell::create([
                                'row_id' => $row->id,
                                'column_name' => $colIndex,
                                'value' => $cellValue
                            ]);
                        }
                    }
                }
            }

            // ADD NEW BOTTOM TABS
            if ($request->bottom_tabs) {
                foreach ($request->bottom_tabs as $tabIndex => $tabData) {
                    $tab = ProductTab::create([
                        'product_id' => $product->id,
                        'title' => $tabData['title'] ?? '',
                        'section' => 'bottom'
                    ]);

                    foreach ($tabData['rows'] ?? [] as $rowIndex => $rowData) {
                        $row = ProductTabRow::create([
                            'tab_id' => $tab->id,
                            'label' => $rowData['label'] ?? '',
                            'value' => null
                        ]);

                        foreach ($rowData['cells'] ?? [] as $colIndex => $cellValue) {
                            ProductTabCell::create([
                                'row_id' => $row->id,
                                'column_name' => $colIndex,
                                'value' => $cellValue
                            ]);
                        }
                    }
                }
            }


            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', $e->getMessage());
        }
    }
    public function deleteColor($id)
    {
        $color = ProductColor::findOrFail($id);
        Storage::disk('public')->delete($color->color_image);
        $color->delete();

        return response()->json(['success' => true]);
    }

    public function deleteImage($id)
    {
        $img = ProductImage::findOrFail($id);
        Storage::disk('public')->delete($img->image_path);
        $img->delete();

        return response()->json(['success' => true]);
    }

    public function deleteTab($id)
    {
        $tab = ProductTab::findOrFail($id);

        foreach ($tab->rows as $row) {
            $row->cells()->delete();
            $row->delete();
        }
        $tab->delete();

        return response()->json(['success' => true]);
    }


    public function deleteTabRow($id)
    {
        $row = ProductTabRow::findOrFail($id);
        $row->cells()->delete();
        $row->delete();

        return response()->json(['success' => true]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted successfully');
    }

    public function specialOfferUpdate(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->is_special_offer = $request->is_special_offer;
        $product->special_price_before = $request->special_price_before;
        $product->special_price_after = $request->special_price_after;
        $product->save();

        return response()->json(['success' => true]);
    }
    public function togglePopular(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->is_popular = $request->is_popular ? 1 : 0;
        $product->save();

        return response()->json([
            'success' => true,
            'popular_status' => $product->is_popular
        ]);
    }

}
