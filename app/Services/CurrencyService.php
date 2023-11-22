<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrencyService
{

    public function rub($amount)
    {
        $rub_currency = Http::get('https://cbu.uz/ru/arkhiv-kursov-valyut/json/RUB/')->json([0]);

        return $rub_currency;
    }


}
