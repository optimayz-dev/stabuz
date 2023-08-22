<?php

namespace App\View\Components\Front;

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
        $this->products = Cache::remember('main_products', 60, function (){
            return Product::with('translations', 'brand.translations', 'tags.translations')->orderBy('created_at', 'desc')->limit(10)->get();
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
