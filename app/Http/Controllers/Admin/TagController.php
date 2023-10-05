<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\TagRequest;
use App\Models\Admin\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::query()->with('translations')->get();

        return view('admin.tags.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $tag = new Tag($request->validated());

        $tag->save();

        return redirect()->route('admin.tag.index')->with('success', 'Успешно создан');
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
    public function edit(Tag $tag)
    {
        return view('admin.tags.update', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Tag $tag, TagRequest $request)
    {
        $tag->fill($request->validated());

        $tag->update();

        return redirect()->route('admin.tag.index')->with('success', 'Успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->back()->with('success', 'Успешно удален');
    }
}
