<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Subcategory extends Model implements TranslatableContract
{

    use HasFactory, Translatable, Searchable;
    public $translatedAttributes = [
        'title',
        'seo_title',
        'seo_description',
        'meta_keywords',
        'description',
    ];
    protected $fillable = ['category_id'];
    protected $table = 'subcategories';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }

}
