<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsRequest;
use App\Models\Admin\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::query()->with('translations')->get();

        return view('admin.news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $news = new News($request->validated());

        if ($request->file('image'))
            $image = $request->file('image')->store('images');

        $news->image = $image ?? '';

        $news->save();

        return redirect()->back()->with('success', 'Успешно создан');
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
    public function edit(News $news)
    {
        return view('admin.news.update', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(News $news, NewsRequest $request)
    {
        $news->fill($request->validated());
        if ($request->file('image')) {
            $image = $request->file('image')->store('images');
        } else
            $image = $news->image;

        $news->image = $image ?? '';

        $news->update();

        return redirect()->back()->with('success', 'Успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->back()->with('success', 'Успешно удален ');
    }
}
