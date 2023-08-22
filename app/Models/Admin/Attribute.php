<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Attribute extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    public $translatedAttributes = [
        'title',
        'value'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'attribute_products');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_attribute');
    }

    public static function deleteBulkAttributes($selectedAttributes)
    {
        foreach ($selectedAttributes as $attributeId) {
            $attribute = Attribute::findOrFail($attributeId);
            $attribute->delete();
            Cache::forget('attributes');
        }
        return 'Атрибуты успешно удалены';
    }

//    public static function updateAttributeFields($request, $attribute, $fields, $id)
//    {
//        foreach ($fields as $field) {
//            $attribute->$field = $request->input("{$field}_{$id}");
//        }
//        $attribute->update();
//
//        Cache::forget('attribute_{$attribute->id}');
//    }
}
