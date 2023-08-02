<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    protected $fillable = [];
//
    public $translatedAttributes = [
        'title',
        'seo_title',
        'seo_description',
        'meta_keywords',
    ];

    public function categories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function getSubcategories(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Subcategory::class, Category::class);
    }
}
