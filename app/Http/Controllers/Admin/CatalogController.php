<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;
use App\Models\Admin\Catalog;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Cache::remember('catalogs', 60, function () {
            return Category::with('translations')
                ->whereNull('lvl')
                ->get();
        });

        return view('admin.catalogs.index', compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catalogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatalogRequest $request)
    {
        foreach ($request->addmore as $key => $value)
        {
            $catalog = new Category();
            $catalog->title = $value['title'];
            $catalog->description = $value['description'];
            $catalog->seo_title = $value['seo_title'];
            $catalog->seo_description = $value['seo_description'];
            $catalog->meta_keywords = $value['meta_keywords'];
            $catalog->save();
        }
        return redirect()->back()->with('success', 'Данные успешно добавлены.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $catalog)
    {
        // Загружаем дочерние категории с переводами
        $catalog->load(['children.translations', 'translations']);

        return view('admin.catalogs.view', compact('catalog'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $catalog)
    {
        $catalog->delete();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    protected function editSelected(Request $request)
    {
        if ($request->input('selected_catalogs', [])){
            $selectedCatalogs = $request->input('selected_catalogs', []);
            $catalogs = Category::whereIn('id', $selectedCatalogs)->with('translations')->orderBy('id','asc')->get();
        } else {
            $catalogs = Category::all();
        }
        return view('admin.catalogs.update', compact('catalogs'));
    }

    public function updateSelected(UpdateCatalogRequest $request)
    {
        $locale = $request->getlocale;
        app()->setLocale($locale);

        $selectedCatalogs = $request->input('selected_catalogs', []);
        $fields = ['title', 'description', 'seo_title', 'seo_description', 'meta_keywords'];

        $catalogsToUpdate = $selectedCatalogs ? Category::whereIn('id', $selectedCatalogs)->get() : Category::all();

        foreach ($catalogsToUpdate as $catalog) {
            $this->updateCatalogFields($request, $catalog, $fields, $catalog->id);

            //Обновляем кэш для каждого каталога
            Cache::forget("catalog_{$catalog->id}");
        }
        Cache::forget('catalogs');

        return redirect()->route('admin.catalog.index')->with('success', 'Данные успешно обновлены.');
    }

    private function updateCatalogFields($request, $catalog, $fields, $id)
    {
        foreach ($fields as $field) {
            $catalog->$field = $request->input("{$field}_{$id}");
        }
        $catalog->update();

        Cache::forget('category_{$category->id}');
    }



    protected function destroySelected($selectedCatalogs)
    {
        foreach ($selectedCatalogs as $catalogId) {
            $catalog = Category::findOrFail($catalogId);
            $catalog->delete();
        }
        return redirect()->back();
    }

    public function handleBulkActions(Request $request)
    {
        $selectedCatalogs = $request->input('selected_catalogs', []);
        $action = $request->input('action');
        if ($action === 'edit') {
            return $this->editSelected($request);
        } elseif ($action === 'delete') {
            return $this->destroySelected($selectedCatalogs);
        }
    }
}
