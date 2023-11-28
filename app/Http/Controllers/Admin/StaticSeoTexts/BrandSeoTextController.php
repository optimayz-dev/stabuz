<?php

namespace App\Http\Controllers\Admin\StaticSeoTexts;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaticText\StaticTextRequest;
use App\Models\Admin\StaticText;
use Illuminate\Http\Request;

class BrandSeoTextController extends Controller
{
    public $type = 'brand_seo';

    public function index()
    {
        $static_texts = StaticText::query()->with('translations')
            ->where('type', $this->type)->get();

        return view('admin.static-text-brand.index', ['static_texts' => $static_texts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.static-text-brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaticTextRequest $request)
    {

        $seo_text = new StaticText($request->validated());

        $seo_text->type = $this->type;

        $seo_text->save();

        return redirect()->route('admin.static-text-brand.index')->with('success', 'Успешно добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaticText $staticTextBrand)
    {
        return view('admin.static-text-brand.update', ['staticText' => $staticTextBrand->load('translations')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaticText $staticTextBrand, StaticTextRequest $request)
    {
        $staticTextBrand->fill($request->validated());

        $staticTextBrand->update();

        return redirect()->route('admin.static-text-brand.index')->with('success', 'Успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaticText $staticTextBrand)
    {
        $staticTextBrand->delete();

        return redirect()->back()->with('success', 'Успешно удален');
    }
}
