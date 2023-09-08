<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;
use App\Models\Admin\Catalog;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $catalogs = Cache::remember('catalogs', 60, function () {
            $catalogs = Category::with('translations')
                ->where('lvl')
                ->get();
//        });
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
            $catalog = new Category();
            $catalog->title = $value['title'];
            $catalog->description = $value['description'];
            $catalog->seo_title = $value['seo_title'];
            $catalog->seo_description = $value['seo_description'];
            $catalog->meta_keywords = $value['meta_keywords'];
            $catalog->save();
        }
        return redirect()->back()->with('success', 'Данные успешно добавлены.');
    }

    public function search(Request $request)
    {
        $searchText = $request->query('search');

        $categories = Category::query()->whereNull('lvl')->with('translations')->whereHas('translations', function ($query) use ($searchText) {
            $query->where('title', 'like', $searchText . '%');
        })
            ->limit(10)
            ->get(); // Select only id and title fields

        return response()->json($categories);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $catalog)
    {
        $catalog->delete();
        return redirect()->back();
    }
}
