<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\VideoReview;
use Illuminate\Http\Request;

class VideoReviewController extends Controller
{
    public function index()
    {
        $video_reviews = VideoReview::query()->with('translations')->get();

        return view('front.video-review', ['video_reviews' => $video_reviews]);
    }
}
