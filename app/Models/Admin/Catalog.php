<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['title', 'descr'];

    public function categories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function getSubcategories(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Subcategory::class, Category::class);
    }

    public function getTranslationModelName(): string
    {
        return \App\Models\Translation::class;
    }
}
