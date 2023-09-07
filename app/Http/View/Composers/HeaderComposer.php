<?php

namespace App\Http\View\Composers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use App\Models\Admin\Category; // Вам нужно подключить модель, которую хотите использовать

class HeaderComposer
{
    public function compose(View $view)
    {
//        $catalogs = Cache::remember('all_categories', 60 * 60 * 24, function (){
            $catalogs = Category::with('translations', 'children.translations')
                ->tree()
                ->get()
                ->toTree();
//        });
        $view->with('catalogs', $catalogs);
    }
}
