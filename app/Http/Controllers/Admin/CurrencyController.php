<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currencies = Currency::query()->get();

        return view('admin.currencies.index', ['currencies'=> $currencies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Currency $currency)
    {
        return view('admin.currencies.update', ['currency' => $currency]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Currency $currency,Request $request)
    {
        $currency->update([
            'value' => $request->input('value')
        ]);

        return redirect()->route('admin.currency.index')->with('success', 'Успешно обновлен ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
