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
        $catalogs = Catalog::all();

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
            $catalog->descr = $value['descr'];
            $catalog->save();
        }
        return redirect()->back()->with('success', 'Данные успешно добавлены.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalog $catalog)
    {
        $catalogs = Catalog::all();
        return view('admin.catalog.edit', compact('catalogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatalogRequest $request, Catalog $catalog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        //
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

    public function updateSelected(Request $request)
    {
        $selectedCatalogs = $request->input('selected_catalogs', []);

        if ($selectedCatalogs) {
            foreach ($selectedCatalogs as $catalogId) {
                $catalog = Catalog::findOrFail($catalogId);
                $catalog->title = $request->input('title_'.$catalogId);
                $catalog->descr = $request->input('descr_'.$catalogId);
                $catalog->save();
            }
        } else {
            $catalogs = Catalog::all();
            foreach ($catalogs as $catalog) {
                $catalog->title = $request->input('title_'.$catalog->id);
                $catalog->descr = $request->input('descr_'.$catalog->id);
                $catalog->save();
            }
        }

        return redirect()->back()->with('success', 'Данные успешно обновлены.');
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
