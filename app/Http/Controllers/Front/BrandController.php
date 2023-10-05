<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::query()->with('translations')->get();

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
                'products',
                'products.prices',
                'products.translations',
                'categories',
                'categories.children.translations',
                'categories.translations',
            ])
            ->whereHas('translations', function ($query) use ($slug){
               $query->where('slug', $slug);
            })
//            ->whereHas('categories.children', function ($query) use ($id){
//                $query->where('id', $id->id);
//            })
            ->first();

        return view('front.brand-detail', ['brand' => $brand]);
    }



}
