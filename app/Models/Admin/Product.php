<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['title', 'descr'];


    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
