<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\StaticText;
use App\Models\Admin\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function newProducts()
    {
        $tags = Tag::join('tag_translations', 'tags.id', '=', 'tag_translations.tag_id')
            ->where('title', 'new')
            ->with('translations', 'products.translations', 'products.prices.currency', 'products.brand.translations')->get();
        return view('front.new-products', compact('tags'));
    }

    public function detailProduct($slug)
    {
        $seo = StaticText::query()->with('translations')
            ->where('type', 'product_seo')->first();

        $product = Product::query()->whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
            ->with([
                'translations',
                'prices',
                'prices.currency',
                'brand',
                'brand.translations',
                'brand.country',
                'brand.country.translations',
                'images'
            ])
            ->first();

        session()->push('products_recently_viewed', $product->getKey());

        return view('front.product-detail', compact('product', 'seo'));
    }


    public function index(Request $request)
    {

        $products = Product::query()->with('translations')
            ->whereHas('translations', function ($query) use ($request) {
                $query->where('title', 'LIKE', "%{$request->input('search')}%");
            })->get();


        return response($products);
    }

}
