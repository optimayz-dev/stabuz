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

    protected $fillable = [
        'file_url'
    ];
    public $translatedAttributes = [
        'title',
        'attribute_value',
        'attribute_title',
        'seo_title',
        'seo_description',
        'meta_keywords',
        'description',
    ];
        public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function price(){
            return $this->hasOne(Price::class);
    }

    public function brand(){
            return $this->belongsTo(Brand::class);
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
