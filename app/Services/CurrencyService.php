<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CurrencyService
{

    public function sum($amount)
    {

        $rub_currency = Cache::remember('usd-currency', 21600, function (){

            return Http::get('https://cbu.uz/ru/arkhiv-kursov-valyut/json/usd/')->json([0]);

        });


        $total = $amount * $rub_currency['Rate'];

        return number_format($total);
    }


    public function rub()
    {

    }



}
