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

        $brands = Cache::remember('brands', 24 * 60 * 60, function () {
            $brands = Brand::with('translations')->get();
            return $brands;
        });

        $catalogs = Cache::remember('catalogs', 60, function () {
            return Category::with('translations')
                ->whereNull('lvl')
                ->get();
        });

        $tags = Cache::remember('tags_with_products', now()->addHours(1), function () {
            return Tag::with(['translations','products.translations' => function ($query) {
                    $query->take(5); // Ограничиваем количество продуктов до 5
                }])
                ->get();
        });

        return view('front.home', [
            "brands" => $brands,
            "catalogs" => $catalogs,
            "tags" => $tags
        ]);
    }

}
