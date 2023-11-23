<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::query()->with('translations')->paginate(32);

        return view('front.brands', ['brands' => $brands]);
    }

    public function detail($slug)
    {
        $locale = App::getLocale();

//        $id = Brand::query()->whereHas('translations', function ($query) use ($slug){
//            $query->where('slug', $slug);
//        })->first();
//
//
//        $item = Brand::query()->whereHas('categories.children', function ($query) use ($id){
//            $query->where('id', $id->id);
//        })->first();

//        return $item;

        $brand = Brand::query()
            ->with([
                'translations',
                'categories',
                'categories.children.translations',
                'categories.translations',
            ])
            ->whereHas('translations', function ($query) use ($slug){
               $query->where('slug', $slug);
            })->first();

        $products = Product::query()
            ->with([
                'images',
                'translations',
            ])->where('brand_id', $brand->id)->paginate(30);

        return view('front.brand-detail', ['brand' => $brand, 'products' => $products]);
    }



}
