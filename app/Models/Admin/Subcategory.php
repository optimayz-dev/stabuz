<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['title', 'descr'];
    public function getTranslationModelName(): string
    {
        return \App\Models\Translation::class;
    }

    protected $fillable = [
        'category_id',
        'title',
        'descr'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
