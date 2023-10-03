<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function detail($slug)
    {
        $news = News::query()->with('translations')
            ->whereHas('translations', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->first();

        return view('front.news-detail', ['news' => $news]);
    }

    public function newsList()
    {
        $news = News::query()->with('translations')->get();

        return view('front.news-list', ['news' => $news]);

    }
}

