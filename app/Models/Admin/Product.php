<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
//    use Translatable;
//    public $translatedAttributes = ['title', 'descr'];
//    public function getTranslationModelName(): string
//    {
//        return \App\Models\Translation::class;
//    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
