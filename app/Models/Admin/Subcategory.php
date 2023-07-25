<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{

    use HasFactory, Translatable;
    public $translatedAttributes = ['title', 'descr'];
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
}
