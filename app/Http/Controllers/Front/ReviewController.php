<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\ReviewRequest;
use App\Models\Admin\Review;
use App\Models\Admin\ReviewImage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {

        $review = Review::query()->create([
            'product_id' => $request->input('product_id'),
            'user_id' => auth('web')->user()->id ?? null,
            'name' => $request->input('name') ?? auth('web')->user()->name,
            'email' => $request->input('email') ?? auth('web')->user()->login,
            'description' => $request->input('description'),
            'grade' => $request->input('grade'),
            'status' => 'not_accept'
        ]);

        if ($request->has('images')){
            foreach ($request->images as $key => $image){
                ReviewImage::query()->create([
                    'review_id' => $review->id,
                    'image' =>  Storage::put('images', $image),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Ваш отзыв отправлен !');
    }
}
