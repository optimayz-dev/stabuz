<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function catalogView($slug)
    {
        $catalog = Category::join('category_translations', 'categories.id', '=', 'category_translations.category_id')
            ->where('category_translations.slug', $slug)
            ->with('children.translations')
            ->first();
        dd($catalog);
    }
}
