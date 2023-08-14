<?php

namespace App\View\Components\front;

use App\Models\Admin\Product;
use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;


class ProductCardComponent extends Component
{
    public Collection $products;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->products = Cache::remember('actual_products', 60, function (){
            return Product::with('translations', 'price', 'brand.translations', 'tags.translations')->limit(5)->get();
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front.product-card-component');
    }
}
