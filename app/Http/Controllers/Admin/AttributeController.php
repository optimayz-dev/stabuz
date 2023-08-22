<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeStoreRequest;
use App\Models\Admin\Attribute;
use App\Models\Admin\AttributeTranslation;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AttributeController extends Controller
{
    public function getAttributes(Request $request)
    {
        $category_id = $request->query('search');

        $category = Category::findOrFail($category_id);
        $attributes = $category->attributes; // Предполагается, что у вас есть метод attributes() в модели Category

        return response()->json($attributes);
    }

    public function index()
    {
        $attributes = Attribute::with('translations')->get();

        return view('admin.attributes.index', ['attributes' => $attributes]);
    }

    public function create()
    {
        return view('admin.attributes.create');
    }

    public function store(Request $request)
    {
        foreach ($request->addmore as $key => $value) {
            // Проверяем, существует ли атрибут с таким названием
            $existingAttribute = AttributeTranslation::where('title', $value['title'])->first();

            if ($existingAttribute) {
                // Если атрибут с таким названием уже существует, вернуть ошибку
                $errorMessage = 'Атрибут с названием "' . $value['title'] . '" уже существует.';
                Session::flash('attribute_error', $errorMessage);
                return back();
            }

            $attribute = new Attribute();
            $attribute->title = $value['title'];
            $attribute->value = $value['value'];
            $attribute->save();
        }

        // Возвращаем ответ пользователю с информацией о созданных атрибутах
        return redirect()->back()->with([
            'success' => 'Атрибуты успешно созданы.',
        ]);
    }


    public function update()
    {

    }

}
