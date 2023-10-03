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
            })->first();

        return view('front.brand-detail', ['brand' => $brand]);
    }



}
