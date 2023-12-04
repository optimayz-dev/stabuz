<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('q');

        $category = Category::query()->whereHas('translations', function ($query) use ($search) {
            $query->where('title', 'LIKE', "%{$search}%");
        })->with([
            'translations',
            'children.translations',
            'brands.translations',
            'brands.country',
            'brands.country.translations',

        ])->first();


        $products = Product::query()->whereHas('translations', function ($query) use ($search) {
            $query->where('title', 'LIKE' , "%{$search}%");
        })->with(['translations', 'brand', 'brand.translations', 'images'])->paginate(30);


        if (empty($products->items()) && $category == null)
            return view('front.search-empty');

        return view('front.search', ['category' => $category, 'products' => $products]);
    }
}
