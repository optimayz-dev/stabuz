<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model implements TranslatableContract
{
    use HasFactory, Searchable, Translatable;


    public $translatedAttributes = [
        'title',
        'attribute_value',
        'attribute_title',
        'seo_title',
        'seo_description',
        'meta_keywords',
        'description',
    ];


    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function price()
    {
        return $this->hasOne(Price::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

//    public function toSearchableArray()
//    {
//        return [
//            'description' => $this->description,
//            'translations' => $this->translations->map(function ($translation) {
//                return ['title' => $translation->title];
//            }),
//        ];
//    }

}
