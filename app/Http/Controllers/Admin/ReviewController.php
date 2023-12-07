<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::query()->orderByDesc('created_at')->paginate(25);

        return view('admin.reviews.index', ['reviews' => $reviews]);
    }

    public function show(Review $review)
    {
        return view('admin.reviews.show', ['review' => $review->load('product', 'product.images', 'product.translations')]);
    }

    public function update(Review $review,Request $request )
    {
        $review->update([
           'status' => $request->input('status')
        ]);

        return redirect()->route('admin.review.index')->with('success', 'Статус успешно обновлен');
    }
}
