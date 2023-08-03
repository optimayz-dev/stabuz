<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CategoryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Imports\CategoryImport;
use App\Models\Admin\Catalog;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Cache::remember('categories', 24 * 60 * 60, function (){
            $categories = Category::with('translations', 'subcategories.translations')->get();
            return $categories;
        });

        return view('admin.categories.index', ['categories' => $categories]);

//        $catalogs = Cache::remember('catalogs', 24 * 60 * 60, function () {
//            $catalogs = Catalog::with('translations','categories.translations')->get();
//            return $catalogs;
//        });
//        return view('admin.categories.index', ['catalogs' => $catalogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function editCategories(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $catalogId = $request->input('select_catalogs');
            $catalog = Catalog::findOrFail($catalogId);
            if ($request->input('selected_category', [])){
                $categoryId = $request->input('selected_category', []);
                $categories = Category::whereIn('id', $categoryId)->orderBy('id')->get();

            } else {
                $categories = Category::all();
            }

        return view('admin.categories.update', ['catalog' => $catalog,'categories' => $categories]);
    }

    public function updateCategories(Request $request)
    {
        $catalogId = $request->input('selected_catalogs');

        $catalog = Catalog::findOrFail($catalogId);

        $catalog->title = $request->input('title_'.$catalogId);
        $catalog->update();

                // Получите выбранные категории для данного каталога
                $selectedCategories = $request->input('selected_category', []);

                // Если есть выбранные категории, обновите их
                if ($selectedCategories) {
                    $categories = Category::whereIn('id', $selectedCategories)->get();

                    foreach ($categories as $category) {
                        // Внесите изменения в категорию
                        $category->title = $request->input('category_title_'.$category->id);
                        $category->descr = $request->input('descr_'.$category->id);
                        // Сохраните изменения
                        $category->update();
                    }
                }


            // Очистите кеш и сохраните обновленные данные в кеше
            Cache::forget('catalogs');
            $updatedCatalogs = Catalog::orderBy('title')->with(['categories'])->get();
            Cache::put('catalogs', $updatedCatalogs, 24 * 60 * 60);

        return redirect()->back()->with('success', 'Каталог и категории успешно обновлены');
    }

    public function addByFile()
    {
        $categories = Category::orderBy('id', 'asc')->get();

        return view('admin.categories.export',['categories' => $categories]);
    }

    public function export()
    {

        return Excel::download(new CategoryExport(), 'categories.xlsx');
    }
    public function import()
    {
        Excel::import(new CategoryImport, request()->file('file'));
        return redirect()->back()->with('success', 'categories was successfully imported');
    }
}
