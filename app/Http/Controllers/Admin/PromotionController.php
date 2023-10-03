<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promotion\PromotionRequest;
use App\Models\Admin\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::query()->with('translations')->get();

        return view('admin.promotions.index', ['promotions' => $promotions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromotionRequest $request)
    {
        $promotion = new Promotion($request->validated());

        if ($request->file('image'))
            $image = $request->file('image')->store('images');

        $promotion->image = $image ?? '';

        $promotion->save();

        return redirect()->back()->with('success', 'Успешно создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.update', ['promotion' => $promotion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Promotion $promotion, PromotionRequest $request)
    {
        $promotion->fill($request->validated());

        if ($request->file('image')){
            $image = $request->file('image')->store('images');
        }else
            $image = $promotion->image;

        $promotion->image = $image;

        $promotion->update();

        return redirect()->route('admin.promotion.index')->with('success', 'Успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();

        return redirect()->back()->with('success', 'Успешно удален');
    }
}
