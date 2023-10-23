<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubcategoryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Imports\SubcategoryImport;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $subcategories = Cache::remember('subcategories', 24 * 60 * 60, function () {
        $subcategories =  Category::where('lvl', 2)
                ->with('translations')
                ->get();
//        });

        $perPage = 50;
        $currentPage = request()->query('page', 1);
        $paginatedData = new LengthAwarePaginator(
            $subcategories->forPage($currentPage, $perPage),
            $subcategories->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        return view('admin.subcategories.index', ['subcategories' => $paginatedData]);
    }

    public function create()
    {
        $categories =  Category::query()->with('translations')->where('lvl',1)->get();

        return view('admin.subcategories.create', ['categories' => $categories]);
    }


    public function store(SubCategoryStoreRequest $request)
    {

        $parentId = $request->parent_id_hidden;

        $parent = Category::find($parentId);
        $lvl = $parent->lvl + 1;

        if (!$parent) {
            return redirect()->back()->withErrors('Родительская категория не найдена.');
        }

        if ($request->hasfile('category_img')) {
            $image = $request->file('category_img')->store('images');
        }

        $category =  new Category();
        $category->title = $request->input('title');
        $category->seo_title = $request->input('seo_title');
        $category->description = $request->input('description');
        $category->seo_description = $request->input('seo_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->parent_id = $request->input('parent_id_hidden');
        $category->category_img = $image ?? null;
        $category->lvl = $lvl;

        $category->save();

        return redirect()->back()->with('success', 'Категория успешно добавлена');
    }


    public function edit(Category $subcategory)
    {
        $catalogs =  Category::query()->with('translations')->where('lvl',1)->get();

        return view('admin.subcategories.update-once', [
            'subcategory' => $subcategory->load('translations'),
            'categories' => $catalogs
        ]);
    }

    public function update(Category $subcategory,Request $request)
    {
        $parentId = $request->parent_id_hidden;

        $parent = Category::find($parentId);
        $lvl = $parent->lvl + 1;

        if (!$parent) {
            return redirect()->back()->withErrors('Родительская категория не найдена.');
        }

        if ($request->hasfile('category_img')) {
            $image = $request->file('category_img')->store('images');
        }

//        $category =  new Category();
        $subcategory->title = $request->input('title');
        $subcategory->seo_title = $request->input('seo_title');
        $subcategory->description = $request->input('description');
        $subcategory->seo_description = $request->input('seo_description');
        $subcategory->meta_keywords = $request->input('meta_keywords');
        $subcategory->parent_id = $request->input('parent_id_hidden');
        $subcategory->category_img = $image ?? null;
        $subcategory->lvl = $lvl;

        $subcategory->update();

        return redirect()->route('admin.subcategory.index')->with('success', 'Категория успешно добавлена');
    }


    public function categoryBulkActions(Request $request)
    {
        $selectedCategories = $request->input('selected_category', []);
        $action = $request->input('action');
        $message = '';

        if ($action === 'edit') {
            return $this->editCategories($request);
        } elseif ($action === 'delete') {
            $message = Category::deleteBulkCategories($selectedCategories);
            Cache::forget('catalogs');
        }

        return redirect()->back()->with('success', $message);
    }

    public function editCategories(Request $request)
    {
        $categoriesId = $request->input('selected_category', []);
        if ($categoriesId){
            $categories = Category::whereIn('id', $categoriesId)->orderBy('id')->with('translations')->get();
            return view('admin.subcategories.update', ['categories' => $categories]);
        } else {
            return redirect()->back()->with('error', 'Выберите категории или категрию');
        }

    }


    public function updateSelected(UpdateCategoryRequest $request)
    {

        dd($request->all());
        $locale = $request->getlocale;
        app()->setLocale($locale);


        foreach ($request->input('id') as $id){
            $category = Category::query()->with('translations')->where('id' , $id)->first();

            $category->update([
                'title' => $request->input('title_'.$id),
                'description' => $request->input('description_'.$id),
                'seo_title' => $request->input('seo_title_'.$id),
                'seo_description' => $request->input('seo_description_'.$id),
                'meta_keywords' => $request->input('meta_keywords_'.$id)
            ]);
        }

        return redirect()->route('admin.subcategory.index')->with('success', 'Данные успешно обновлены.');

    }

}
