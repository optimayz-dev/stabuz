<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;
use App\Models\Admin\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Catalog::with('translations')->get();

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
            $catalog = new Catalog();
            $catalog->title = $value['title'];
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
    public function show(Catalog $catalog)
    {

        return view('admin.catalogs.view', compact('catalog'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        $catalog->delete();
        return redirect()->back();
    }

    public function editSelected(Request $request)
    {
        if ($request->input('selected_catalogs', [])){
            $selectedCatalogs = $request->input('selected_catalogs', []);
            $catalogs = Catalog::whereIn('id', $selectedCatalogs)->orderBy('id','asc')->get();
        } else {
            $catalogs = Catalog::all();
        }

        return view('admin.catalogs.update', compact('catalogs'));
    }

    public function updateSelected(UpdateCatalogRequest $request)
    {
        $selectedCatalogs = $request->input('selected_catalogs', []);

        if ($selectedCatalogs) {
            foreach ($selectedCatalogs as $catalogId) {
                $catalog = Catalog::findOrFail($catalogId);
                $catalog->title = $request->input('title_'.$catalogId);
                $catalog->seo_title = $request->input('seo_title_'.$catalogId);
                $catalog->seo_description = $request->input('seo_description_'.$catalogId);
                $catalog->meta_keywords = $request->input('meta_keywords_'.$catalogId);
                $catalog->update();
            }
        } else {
            $catalogs = Catalog::all();
            foreach ($catalogs as $catalog) {
                $catalog->title = $request->input('title_'.$catalog->id);
                $catalog->seo_title = $request->input('seo_title_'.$catalog->id);
                $catalog->seo_description = $request->input('seo_description_'.$catalog->id);
                $catalog->meta_keywords = $request->input('meta_keywords_'.$catalog->id);
                $catalog->update();
            }
        }

        return redirect()->route('admin.editSelected')->with('success', 'Данные успешно обновлены.');
    }


    public function destroySelected(Request $request)
    {
        $selectedCatalogs = $request->input('selected_catalogs', []);
        foreach ($selectedCatalogs as $catalogId) {
            $catalog = Catalog::findOrFail($catalogId);
            $catalog->delete();
        }
        return redirect()->back();
    }
}
