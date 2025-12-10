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
class HomeController extends Controller
{

    public function index()
    {
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

        return view('frontend.index', compact('products', 'popularProducts'));
    }
    public function about()
    {

        return view('frontend.about');
    }


    public function detail($id)
    {
        $product = Product::with([
            'category',
            'images',
            'colors',
            'tabs.rows.cells',

        ])->findOrFail($id);

        return view('frontend.detail', compact('product'));
    }



}
