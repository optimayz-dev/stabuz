<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
//use Laravel\Scout\Searchable;

class Product extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $guarded = [
        'id'
    ];
    public $translatedAttributes = [
        'title',
        'attribute_value',
        'attribute_title',
        'seo_title',
        'seo_description',
        'meta_keywords',
        'description',
    ];
        public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function images()
    {
        return $this->hasMany(ProductGallery::class);
    }
    public function brand(){
            return $this->belongsTo(Brand::class);
    }

    public static function importFromArray(array $data){

        foreach ($data as $row) {
            $product = Product::findOrNew($row['id']);
            // Создаём или обновляем перевод для текущего языка
            $locale = App::getLocale();
            $product->translateOrNew($locale)->title = $row['title'];
            $product->translateOrNew($locale)->seo_title = $row['seo_title'];
            $product->translateOrNew($locale)->description = $row['description'];
            $product->translateOrNew($locale)->seo_description = $row['seo_description'];
            $product->translateOrNew($locale)->meta_keywords = $row['meta_keywords'];
            $categoryId = $row['category_id'];
            $product->file_url = $row['file_url'];
            $product->save();
            $product->categories()->attach($categoryId);
       }
    }

//    public function toSearchableArray()
//    {
//        return [
//            'description' => $this->description,
//            'translations' => $this->translations->map(function ($translation) {
//                return ['title' => $translation->title];
//            }),
//        ];
//    }

}
