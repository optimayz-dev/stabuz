<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function categoriesView()
    {
        $catalogs = Cache::remember('catalogs', 60, function () {
            return Category::with('translations')
                ->whereNull('lvl')
                ->get();
        });
        return view('front.categories', compact('catalogs'));
    }
    public function categoryView($slug)
    {
        $cacheKey = 'category' . $slug;

        $category = Cache::remember($cacheKey, now()->addHours(1), function () use ($slug) {
            return Category::join('category_translations', 'categories.id', '=', 'category_translations.category_id')
                ->where('category_translations.slug', $slug)
                ->with('children.translations', 'translations', 'products.translations', 'products.prices.currency', 'products.brand.translations', 'brands.translations')
                ->first();
        });

        return view('front.category', compact('category'));
    }

}