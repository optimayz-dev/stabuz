<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeStoreRequest;
use App\Models\Admin\Attribute;
use App\Models\Admin\AttributeTranslation;
use App\Models\Admin\Category;
use App\Services\AttributeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
        $attributes = Cache::remember('attributes', 60 * 60 * 24, function (){
           return Attribute::with('translations')->get();
        });

        return view('admin.attributes.index', ['attributes' => $attributes]);
    }

    public function create()
    {
        return view('admin.attributes.create');
    }
    public function editAttributes(Request $request)
    {
        $attributeId = $request->input('selected_attribute', []);
        if ($attributeId){
            $attributes = Attribute::whereIn('id', $attributeId)->orderBy('id')->with('translations')->get();
            return view('admin.attributes.update', ['attributes' => $attributes]);
        } else {
            return redirect()->back()->with('error', 'Выберите атрибут');
        }
    }
    public function bulkActions(Request $request)
    {
        $selectedAttributes = $request->input('selected_attribute', []);
        $message = '';
        $action = $request->input('action');
        if ($action == 'edit'){
            return $this->editAttributes($request);
        } elseif($action == 'delete') {
            $message = Attribute::deleteBulkAttributes($selectedAttributes);
        }
        return redirect()->back()->with('success', $message);
    }



    public function store(AttributeStoreRequest $request, AttributeService $attributeService)
    {
        $createdAttributes = $attributeService->createOrUpdateAttributes($request->input('addmore'), $request);

        if ($createdAttributes === false) {
            return back();
        }

        return redirect()->route('admin.attribute.index')->with([
            'success' => 'Атрибуты успешно созданы.',
        ]);
    }

    public function bulkUpdate(AttributeStoreRequest $request, AttributeService $attributeService)
    {
        $createdAttributes = $attributeService->createOrUpdateAttributes($request->input('addmore'), $request);


        if ($createdAttributes === false) {
            return redirect()->route('admin.attribute.index')->with([
                'success' => 'Атрибут не обновлен'
            ]);
        }

        return redirect()->route('admin.attribute.index')->with([
            'success' => 'Атрибуты успешно обновлены.',
        ]);
    }

}
