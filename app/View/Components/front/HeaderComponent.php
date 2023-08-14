<?php

namespace App\View\Components\front;

use App\Models\Admin\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;


class HeaderComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public Collection $catalogs;

    public function __construct()
    {
        $this->catalogs = Cache::remember('catalog', 60, function (){
            return Category::with('translations', 'children.translations')
                ->tree()
                ->get()
                ->toTree();
        });
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front.header-component');
    }
}
