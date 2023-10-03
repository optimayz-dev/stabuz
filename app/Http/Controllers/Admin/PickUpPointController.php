<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PickUpPoint\PickUpPointRequest;
use App\Models\Admin\PickUpPoint;
use Illuminate\Http\Request;

class PickUpPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $points = PickUpPoint::query()->with('translations')->get();

        return view('admin.pick-up-points.index', ['points' => $points]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pick-up-points.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PickUpPointRequest $request)
    {
        $point = new PickUpPoint($request->validated());

        $point->save();

        return redirect()->route('admin.pick-up-point.index')->with('success', 'Успешно создан');
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
    public function edit(PickUpPoint $pickUpPoint)
    {

        return view('admin.pick-up-points.update', ['point' => $pickUpPoint]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PickUpPoint $pickUpPoint, PickUpPointRequest $request)
    {
        $pickUpPoint->fill($request->validated());

        $pickUpPoint->update();

        return redirect()->route('admin.pick-up-points.index')->with('success', 'Успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PickUpPoint $pickUpPoint)
    {
        $pickUpPoint->delete();

        return redirect()->back()->with('success', 'Успешно удален');
    }
}
