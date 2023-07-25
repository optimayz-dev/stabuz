<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['title', 'descr'];


    public function catalog(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Catalog::class);
    }
    public function subcategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subcategory::class);
    }
}
