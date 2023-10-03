<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promotion\PromotionBannerRequest;
use App\Models\Admin\PromotionBanner;
use Illuminate\Http\Request;

class PromotionBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = PromotionBanner::query()->with('translations')->get();

        return view('admin.promotion-banners.index',['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promotion-banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromotionBannerRequest $request)
    {
        $banner = new PromotionBanner($request->validated());

        $image = $request->file('image')->store('images');

        $banner->image = $image;

        $banner->save();

        return redirect()->route('admin.promotion-banner.index')->with('success', 'Успешно создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(PromotionBanner $promotionBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PromotionBanner $promotionBanner)
    {
        return view('admin.promotion-banners.update', ['banner' => $promotionBanner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PromotionBannerRequest $request, PromotionBanner $promotionBanner)
    {
        $promotionBanner->fill($request->validated());

        if ($request->file('image'))
            $image = $request->file('image')->store('images');

        $promotionBanner->image = $image ?? $promotionBanner->image;

        $promotionBanner->update();

        return redirect()->route('admin.promotion-banner.index')->with('success', 'Успешно обновлен');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PromotionBanner $promotionBanner)
    {
        $promotionBanner->delete();

        return redirect()->back()->with('success', 'Успешно удален');
    }
}
