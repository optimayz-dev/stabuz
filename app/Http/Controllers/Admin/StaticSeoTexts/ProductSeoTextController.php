<?php

namespace App\Http\Controllers\Admin\StaticSeoTexts;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaticText\StaticTextRequest;
use App\Models\Admin\StaticText;
use Illuminate\Http\Request;

class ProductSeoTextController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $type = 'product_seo';

    public function index()
    {
        $static_texts = StaticText::query()->with('translations')
            ->where('type', $this->type)->get();

        return view('admin.static-text-product.index', ['static_texts' => $static_texts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.static-text-product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaticTextRequest $request)
    {
        $seo_text = new StaticText($request->validated());

        $seo_text->type = $this->type;

        $seo_text->save();

        return redirect()->route('admin.static-text-product.index')->with('success', 'Успешно добавлен');
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
    public function edit(StaticText $staticTextProduct)
    {
        return view('admin.static-text-product.update', ['staticText' => $staticTextProduct->load('translations')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaticText $staticTextProduct, StaticTextRequest $request)
    {
        $staticTextProduct->fill($request->validated());

        $staticTextProduct->update();

        return redirect()->route('admin.static-text-product.index')->with('success', 'Успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaticText $staticTextProduct)
    {
        $staticTextProduct->delete();

        return redirect()->back()->with('success', 'Успешно удален');
    }
}
