<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function getAttributes(Request $request)
    {
        $category_id = $request->query('search');

        $category = Category::findOrFail($category_id);
        $attributes = $category->attributes; // Предполагается, что у вас есть метод attributes() в модели Category

        return response()->json($attributes);
    }

}
