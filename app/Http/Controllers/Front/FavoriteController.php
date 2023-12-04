<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        config(['session.lifetime' => 525600]);
    }

    public function index()
    {


        return view('front.favorites');
    }

    public function add()
    {

    }

    public function remove()
    {

    }
}
