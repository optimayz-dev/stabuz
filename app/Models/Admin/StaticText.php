<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticText extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = [
         'title',
         'seo_title',
         'seo_title_h1',
         'seo_text',
         'meta_description',
         'meta_keywords',
    ];

}
