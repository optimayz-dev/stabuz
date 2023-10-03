<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function promotionList()
    {
        $promotions = Promotion::query()->with('translations')->get();

        return view('front.promotions', ['promotions' => $promotions]);
    }

    public function detail($slug)
    {
        $promotion = Promotion::query()->with('translations')
            ->whereHas('translations', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->first();

        return view('front.promotion-detail', ['promotion' => $promotion]);
    }

}
