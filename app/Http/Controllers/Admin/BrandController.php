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
        $brands = Cache::remember('brands', 24 * 60 * 60, function () {
            $brands = Brand::all();

            $locales = config('app.available_locales'); // Предполагается, что у вас есть массив доступных локалей
            foreach ($brands as $brand) {
                foreach ($locales as $locale) {
                    $brand->translateOrNew($locale)->title;
                    $brand->translateOrNew($locale)->description;
                    // Добавьте другие переводимые поля, если необходимо
                }
            }
            return $brands;
        });
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
        $brand_data = [
            $path = $request->file_url->store('uploads', 'public'),
            'file_url' => '/storage/' . $path,
            app()->getLocale() => [
                'title' => $request->input(app()->getLocale().'_title'),
                'descr' => $request->input(app()->getLocale().'_descr'),
            ],
        ];


        Brand::create($brand_data);
        return redirect()->back()->with('success', 'brand add success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
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
}
