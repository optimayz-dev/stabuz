<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function currency()
    {
        return $this->belongsTo(CurrencyCode::class, 'currency_code_id');
    }

    public function getOldPriceAttribute()
    {
        return $this->attributes['old_price'];
    }

    public function getNewPriceAttribute()
    {
        return $this->attributes['value'];
    }
}
