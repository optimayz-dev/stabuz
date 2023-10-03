<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoReview\VideoReviewRequest;
use App\Models\Admin\VideoReview;
use Illuminate\Http\Request;

class VideoReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $video = VideoReview::query()->with('translations')->get();

        return view('admin.video-reviews.index', ['video' => $video]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video-reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoReviewRequest $request)
    {
        $video = new VideoReview($request->validated());

        $video->save();

        return redirect()->route('admin.video-review.index')->with('success', 'Успешно создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function edit(VideoReview $videoReview)
    {
        return view('admin.video-reviews.update', ['video' => $videoReview]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(VideoReview $videoReview, VideoReviewRequest $request)
    {
        $videoReview->fill($request->validated());

        $videoReview->update();

        return redirect()->back()->with('success', 'Успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoReview $videoReview)
    {
        $videoReview->delete();

        return redirect()->back()->with('success', 'Успешно удален');
    }
}
