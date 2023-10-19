<?php

namespace App\Http\View\Composers;

use App\Models\Admin\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class RecommendProductsComposer
{
    public function compose(View $view)
    {
        $recommend_products = Product::query()->with('translations', 'brand', 'brand.translations')
            ->orderBy('created_at', 'DESC')
            ->where('recommend', 1)->limit(10)->get();

        $view->with('recommend_products', $recommend_products);
    }
}
