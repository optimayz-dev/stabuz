<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Imports\BrandImport;
use App\Models\Admin\Brand;

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
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand($request->validated());
        if ($request->hasFile('brand_logo')){
            $path = $request->brand_logo->store('uploads', 'public');
            $brand->brand_logo = '/storage/' . $path;
        }
        Cache::forget('brands');
        $brand->save();
        return redirect()->back()->with('success', 'Бренд успешно добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $brand->load(['translations','products.translations']);
        return view('admin.brands.view', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }

    public function import(Request $request){
        Excel::import(new BrandImport(), request()->file('file'));
        return redirect()->back()->with('success', 'data was successful imported');
    }

    public function brandCategories(Brand $brand)
    {
        $brand->load(['translations', 'categories.translations']);
        return view('admin.brands.categories');
    }
}
