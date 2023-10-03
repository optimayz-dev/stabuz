<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Imports\BrandImport;
use App\Models\Admin\Brand;

use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $brands = Cache::remember('brands', 24 * 60 * 60, function () {
        $brands = Brand::with('translations')->get();
//            return $brands;
//        });
        return view('admin.brands.index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->with('translations')->get();

        return view('admin.brands.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {

        $brand = new Brand($request->validated());
        if ($request->hasFile('brand_logo')) {
            $path = $request->file('brand_logo')->store('images');
            $brand->brand_logo = $path;
        }

        $brand->save();

        foreach ($request->categories_id as $category) {

            $brand->categories()->attach((integer)$category);
        }
        return redirect()->back()->with('success', 'Бренд успешно добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $brand->load(['translations', 'products.translations']);
        return view('admin.brands.view', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $categories = Category::query()->with('translations')->get();

        return view('admin.brands.update', ['brand' => $brand->load('categories.translations') , 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
//        $brand = new Brand($request->validated());

        $brand->title = $request->input('title');
        $brand->seo_title = $request->input('seo_title');
        $brand->seo_description = $request->input('seo_description');
        $brand->description = $request->input('description');
        $brand->meta_keywords = $request->input('meta_keywords');

        if ($request->hasFile('brand_logo')) {
            $path = $request->file('brand_logo')->store('images');
        } else
            $path = $brand->brand_logo;

        $brand->brand_logo = $path;

//        foreach ($request->categories_id as $category) {

            $brand->categories()->sync($request->categories_id);
//        }

        $brand->update();
        return redirect()->back()->with('success', 'Бренд успешно добавлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->back()->with('success', 'Успешно удален !');
    }

    public function import(Request $request)
    {
        Excel::import(new BrandImport(), request()->file('file'));
        return redirect()->back()->with('success', 'data was successful imported');
    }

    public function brandCategories(Brand $brand)
    {
        $brand->load(['translations', 'categories.translations']);
        return view('admin.brands.categories');
    }
}
