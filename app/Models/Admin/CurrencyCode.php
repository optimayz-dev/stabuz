<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyCode extends Model
{
    use HasFactory;

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

}
