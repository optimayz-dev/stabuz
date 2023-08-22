<?php

namespace App\Services;
use App\Models\Admin\Attribute;
use App\Models\Admin\AttributeTranslation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AttributeService
{
    public function createOrUpdateAttributes($attributesData)
    {
        $createdAttributes = [];

        foreach ($attributesData as $data) {
            $locale = app()->getLocale();
            $title = $data['title'];

            $existingAttribute = Attribute::whereHas('translations', function ($query) use ($locale, $title) {
                $query->where('locale', $locale)->where('title', $title);
            })->first();

            if ($existingAttribute) {
                $errorMessage = 'Атрибут с названием "' . $data['title'] . '" уже существует.';
                Session::flash('attribute_error', $errorMessage);
                return false;
            }

            $attribute = new Attribute();
            $attribute->save();

            $attributeTranslation = new AttributeTranslation();
            $attributeTranslation->attribute_id = $attribute->id;
            $attributeTranslation->locale = $locale;
            $attributeTranslation->title = $data['title'];
            $attributeTranslation->value = $data['value'];
            $attributeTranslation->save();

            $createdAttributes[] = $attribute;
        }

        // Сбросить кэш для группы атрибутов
        Cache::forget('attributes');

        return $createdAttributes;
    }
}
