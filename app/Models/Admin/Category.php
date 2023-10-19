<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'slug',
        'description',
        'seo_title',
        'seo_description',
        'meta_keywords',
    ];

//    public $preventsLazyLoading = true;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'category_attribute');
    }

    public static function deleteBulkCategories($selectedCategories)
    {
        foreach ($selectedCategories as $categoryId) {
            $category = Category::findOrFail($categoryId);
            $category->delete();
            Cache::forget('categories');
        }
        return 'Категории успешно удалены';
    }

    public static function updateCatalogFields($request, $catalog, $fields, $id)
    {
//        dd($fields);

        foreach ($fields as $field) {
            $catalog->$field = $request->input("{$field}_{$id}");
        }
        $catalog->update();

//        Cache::forget('category_{$category->id}');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'category_brand');
    }


}
