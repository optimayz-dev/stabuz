<?php

namespace App\Http\Controllers;

use App\Models\Admin\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function excel()
    {
        $locale = App::getLocale();

        $products = Product::query()->with(['translations', 'categories', 'categories.translations', 'tags', 'tags.translations'])
            ->whereHas('translations', function ($query) use ($locale) {
                $query->where('locale', $locale);
            })->orderBy('id')->get();


        return view('products-excell', ['products' => $products]);
    }
}
