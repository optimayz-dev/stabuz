<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    public function setCurrency($currency)
    {
        Session::get('currency');

        Session::put('currency', $currency);


        return redirect()->back();
    }

}
