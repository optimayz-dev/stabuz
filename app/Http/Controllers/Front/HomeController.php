<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function homepage()
    {
        $catalogs = Cache::remember('categories', 60, function () {
            return Category::whereNull('lvl')
                ->with('translations', 'children.translations')
                ->get();
        });
        $brands = Cache::remember('brands', 60, function (){
            return Brand::with('translations')->get();
        });

        $tagsToSelect = ['featured', 'popular', 'new', 'discounted'];

        $productsByTag = [];

        foreach ($tagsToSelect as $tagName) {
            $taggedProducts = Product::with(['tags.translations' => function ($query) use ($tagName) {
                $query->where('title', $tagName);
            }])->limit(5)->get();


            $productsByTag[$tagName] = $taggedProducts;
        }

        return view('front.home', [
            "catalogs" => $catalogs,
            "brands" => $brands,
            "productsByTag" => $productsByTag
        ]);
    }

}
