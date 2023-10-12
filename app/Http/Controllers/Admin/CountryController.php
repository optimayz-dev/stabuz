<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryRequest;
use App\Models\Admin\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::query()->with('translations')->get();

        return view('admin.country.index', ['country' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {
        $country = new Country($request->validated());

        $country->save();

        return redirect()->route('admin.country.index')->with('success', 'Успешно создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('admin.country.update',['country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, Country $country)
    {
        $country->fill($request->validated());

        $country->update();

        return redirect()->route('admin.country.index')->with('success', 'Успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->back()->with('success', 'Успешно удален');
    }
}
