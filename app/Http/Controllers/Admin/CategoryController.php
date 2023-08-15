<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CategoryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Imports\CategoryImport;
use App\Models\Admin\Catalog;
use App\Models\Admin\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
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
        $categories= Cache::remember('categories', 60, function () {
            return Category::where('lvl', 1)
                ->with('translations', 'children.translations')
                ->get();
        });

        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category($request->validated());
        if ($request->hasfile('category_img')){
            $path = $request->file_url->store('uploads', 'public');
            $category->file_url = '/storage/'.$path;
        }
        $category->save();
        return redirect()->back()->with('success', 'Категория успешно добавлена');
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

    public function editCategories(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $catalogId = $request->input('select_catalogs');

            $catalog = Category::findOrFail($catalogId);
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
        $selectedCategoryIds = $request->input('selected_category', []);
        $locale = $request->getlocale;
        app()->setLocale($locale);

        foreach ($selectedCategoryIds as $categoryId) {
            $category = Category::findOrFail($categoryId);

            // Обновление переводов для каждой категории
            $category->title = $request->input("category_title_{$categoryId}");
            $category->description = $request->input("description_{$categoryId}");
            // Добавьте остальные поля для обновления

            // Сохранение изменений
            $category->save();
        }

        // Очистите кеш для обновленных категорий
        foreach ($selectedCategoryIds as $categoryId) {
            Cache::forget("category_{$categoryId}");
        }

        // Очистите кеш для списка категорий
        Cache::forget('categories');

        return redirect()->route('admin.category.index')->with('success', 'Каталог и категории успешно обновлены');
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

    public function search(Request $request)
    {
        $searchText = $request->query('search');

        $categories = Category::whereHas('translations', function ($query) use ($searchText) {
            $query->whereNull('parent_id')->where('title', 'like', $searchText . '%');
        })
            ->limit(10)
            ->get(); // Select only id and title fields

        return response()->json($categories);
    }

    public function categoryBulkActions(Request $request)
    {

        $selectedCategories = $request->input('selected_category', []);
        $action = $request->input('action');
        if ($action === 'edit') {
            return $this->editCategories($request);
        } elseif ($action === 'delete') {
            return $this->destroySelected($selectedCategories);
        }
    }

    protected function destroySelected($selectedCategories)
    {
        foreach ($selectedCategories as $categoryId) {
            $category = Category::findOrFail($categoryId);
            Cache::forget('categories');
            $category->delete();
        }
        return redirect()->back()->with('success', 'Подкатегория удалена');
    }

}
