<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Tag;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function homepage()
    {
        $cacheDuration = 24 * 60 * 60;
        $brands = Cache::remember('brands', $cacheDuration, function () {
            return Brand::select('id', 'brand_logo')->limit(10)->get();
        });


        $catalogs = Cache::remember('catalogs', $cacheDuration, function () {
            return Category::whereNull('lvl')
                ->with('translations')
                ->get();
        });
        $tags = Cache::remember('main_products', $cacheDuration, function () {
            return Tag::with('translations', 'products.brand.translations', 'products.prices.currency', 'products.translations')->orderBy('created_at', 'desc')->limit(10)->get();
        });

        return view('front.home', [
            "brands" => $brands,
            "catalogs" => $catalogs,
            'tags' => $tags
        ]);
    }

}
