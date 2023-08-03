<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogTranslation extends Model
{
    use HasFactory, Sluggable;

    public $timestamps = false;
    protected $fillable = [
        'title',
        'slug',
        'seo_title',
        'seo_description',
        'meta_keywords',
    ];

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
