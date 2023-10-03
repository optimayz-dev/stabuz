<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoReview extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = [
        'title',
        'description',
        'slug',
        'seo_title',
        'seo_description',
        'meta_keywords',
    ];
}
