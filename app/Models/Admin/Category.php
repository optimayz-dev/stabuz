<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model implements TranslatableContract
{
    use HasFactory, Translatable, HasRecursiveRelationships;

    public $translatedAttributes = [
        'title',
        'description',
        'seo_title',
        'seo_description',
        'meta_keywords',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
