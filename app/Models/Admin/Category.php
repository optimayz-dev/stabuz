<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model implements TranslatableContract
{
    use HasFactory, Translatable, HasRecursiveRelationships;
    protected $fillable = [
        'parent_id',
        'category_img'
    ];

    public $translatedAttributes = [
        'title',
        'description',
        'seo_title',
        'seo_description',
        'meta_keywords',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public static function deleteBulkCategories($selectedCategories)
    {
        foreach ($selectedCategories as $categoryId) {
            Cache::forget('categories');
            $category = Category::findOrFail($categoryId);

            $category->delete();
        }
        return 'Категории успешно удалены';
    }

    public static function updateCatalogFields($request, $catalog, $fields, $id)
    {
        foreach ($fields as $field) {
            $catalog->$field = $request->input("{$field}_{$id}");
        }
        $catalog->update();

        Cache::forget('category_{$category->id}');
    }

}
