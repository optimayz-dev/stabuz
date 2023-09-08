<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubcategoryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Imports\SubcategoryImport;
use App\Models\Admin\Category;
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

        $perPage = 10;
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
        return view('admin.subcategories.create');
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


}
