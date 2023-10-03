<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Faq\FaqRequest;
use App\Models\Admin\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::query()->with('translations')->get();

        return view('admin.faqs.index', ['faqs' => $faqs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        $faq = new Faq($request->validated());

        $faq->save();

        return redirect()->route('admin.faq.index')->with('success', 'Успешно создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.update', ['faq' => $faq]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Faq $faq, FaqRequest $request)
    {
        $faq->fill($request->validated());
        $faq->update();
        return redirect()->route('admin.faq.index')->with('success', 'Успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->back()->with('success', 'Успешно удален');
    }
}
