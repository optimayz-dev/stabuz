<?php

namespace App\Http\View\Composers;

use App\Models\Admin\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class RecentlyViewedProductsComposer
{
    public function compose(View $view)
    {
        if (!empty(session('products_recently_viewed'))) {
            $recent_products = array_unique(session('products_recently_viewed'));

            $products = Product::query()->with(['translations', 'brand', 'brand.translations', 'images' => function($q){
                $q->first();
            }])
                ->whereIn('id', $recent_products)->get();

        }
        $view->with('recently_products', $products ?? null);

    }
}
