<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubcategoryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Imports\SubcategoryImport;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Maatwebsite\Excel\Facades\Excel;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('subcategories')->get();
        return view('admin.subcategories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories = Subcategory::orderBy('id', 'desc')->take(10)->get();
        return view('admin.subcategories.create', ['subcategories' => $subcategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubcategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubcategoryRequest $request, Subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        //
    }

    public function export()
    {
        return Excel::download(new SubcategoryExport, 'subcategory.csv');
    }

    public function import()
    {
        Excel::import(new SubcategoryImport, request()->file('file'));
        return back();
    }
}
