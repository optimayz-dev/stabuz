<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    public function index()
    {
        $user = User::query()->with('reviews', 'reviews.images', 'reviews.product')->where('id', auth('web')->user()->id)->first();

        return view('front.cabinet', ['user' => $user]);
    }


}
