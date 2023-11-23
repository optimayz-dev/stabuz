<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function categoriesView()
    {
//        $catalogs = Cache::remember('catalogs', 60, function () {
        $catalogs = Category::with('translations')
            ->whereNull('lvl')
            ->get();
//        });
        return view('front.categories', compact('catalogs'));
    }

    public function categoryView($slug)
    {
//        $cacheKey = 'category' . $slug;

//        $category = Cache::remember($cacheKey, now()->addHours(1), function () use ($slug) {
//            $category = Category::join('category_translations', 'categories.id', '=', 'category_translations.category_id')
//                ->where('category_translations.slug', $slug)
//                ->with('children.translations', 'translations', 'products.translations', 'products.prices.currency', 'products.brand.translations', 'brands.translations')
//                ->first();
//        });

//        $category = Category::query()
//            ->whereHas('translations', function ($query) use ($slug){
//                $query->where('slug', $slug);
//            })
//            ->with([
//                'products',
//                'products.translations',
//                'products.images' => function($query){
//                    $query->first();
//                },
//                'products.brand',
////                'products.brand.translations',
//                'translations',
//                'children.translations',
//                'products.prices.currency',
//                'products.brand.translations',
//                'brands.translations',
//                'brands.country',
//                'brands.country.translations',
//            ])
//
//            ->first();


        $category = Category::query()->whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->with([
            'translations',
            'children.translations',
            'brands.translations',
            'brands.country',
            'brands.country.translations',

        ])->first();

        $products = Product::query()->whereHas('categories.translations', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->with(['translations', 'brand', 'brand.translations', 'images'])->paginate(30);


        return view('front.category', ['category' => $category, 'products' => $products]);
    }

}
