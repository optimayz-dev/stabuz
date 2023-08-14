<?php

namespace App\Models\Admin;


use Astrotomic\Translatable\Traits\Relationship;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model implements TranslatableContract
{

    use HasFactory, Translatable;
    protected $fillable = ['brand_logo'];
    public $translatedAttributes = [
        'title',
        'slug',
        'description',
        'seo_title',
        'seo_description',
        'meta_keywords',
    ];

    public function brandCategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BrandCategory::class);
    }


}
