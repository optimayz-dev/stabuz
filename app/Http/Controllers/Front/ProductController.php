<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\Tag;
use Illuminate\Http\Request;

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
//            $item = Product::query()->findOrFail($product);

            $product = Product::query()->whereHas('translations', function ($query) use ($slug){
                $query->where('slug', $slug);
            })
            ->with([
                'translations',
                'prices',
                'prices.currency',
                'brand',
                'brand.translations'
            ])
            ->first();

            return view('front.product-detail', compact('product'));
    }
}
