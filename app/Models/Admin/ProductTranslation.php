<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use HasFactory, Sluggable;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'slug',
        'attribute_value',
        'attribute_title',
        'seo_title',
        'seo_description',
        'meta_keywords',
        'description',
    ];

//    protected $casts = [
//        'title' => 'string',
//        'slug' => 'string',
//        'attribute_value' => 'string',
//        'attribute_title' => 'string',
//        'seo_title' => 'string',
//        'seo_description' => 'string',
//        'meta_keywords' => 'string',
//        'description' => 'string',
//    ];

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
