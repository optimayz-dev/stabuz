<?php

namespace App\View\Components\Front;

use App\Models\Admin\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class RecentlyViewedProductsComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public Collection $products;

    public function __construct()
    {
        return $this->products = Product::query()->limit(10)->get();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front.recently-viewed-products-component');
    }
}
