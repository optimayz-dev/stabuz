<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainBanner\MainBannerRequest;
use App\Models\Admin\MainBanner;
use Illuminate\Http\Request;

class MainBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = MainBanner::query()->with('translations')->get();

        return view('admin.main-banners.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.main-banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MainBannerRequest $request)
    {
        $banner = new MainBanner($request->validated());

        $image = $request->file('image')->store('images');

        $banner->image = $image;

        $banner->save();

        return redirect()->route('admin.main-banner.index')->with('success', 'Успешно создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(MainBanner $mainBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MainBanner $mainBanner)
    {
        return view('admin.main-banners.update', ['banner' => $mainBanner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MainBannerRequest $request, MainBanner $mainBanner)
    {
        $mainBanner->fill($request->validated());

        if ($request->file('image'))
            $image = $request->file('image')->store('images');

        $mainBanner->image = $image ?? $mainBanner->image;

        $mainBanner->update();

        return redirect()->route('admin.main-banner.index')->with('success', 'Успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MainBanner $mainBanner)
    {
        $mainBanner->delete();

        return redirect()->back()->with('success', 'Успешно удален');
    }
}
