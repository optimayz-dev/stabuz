<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'attribute_value',
        'attribute_title',
        'seo_title',
        'seo_description',
        'meta_keywords',
        'description',
    ];
}
