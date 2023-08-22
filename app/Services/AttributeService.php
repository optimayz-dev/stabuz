<?php

namespace App\Services;
use App\Models\Admin\Attribute;
use App\Models\Admin\AttributeTranslation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AttributeService
{
    public function createOrUpdateAttributes($data, $action)
    {
        $createdAttributes = [];
        $existingAttributeTitles = [];

        foreach ($data as $item) {
            $title = $item['title'];
            $value = $item['value'];

            $existingAttribute = AttributeTranslation::where('title', $title)->first();

            if ($existingAttribute) {
                $existingAttributeTitles[] = $title;
            } else {
                $attribute = new Attribute();
                $attribute->title = $title;
                $attribute->value = $value;
                $attribute->save();

                $createdAttributes[] = $attribute;
            }
        }

        if (!empty($existingAttributeTitles)) {
            $errorMessage = 'Атрибуты с названиями "' . implode('", "', $existingAttributeTitles) . '" уже существуют.';
            Session::flash('attribute_error', $errorMessage);
            return false;
        }

        Cache::forget('attributes');

        $successMessage = ($action === 'create') ? 'Атрибуты успешно созданы.' : 'Атрибуты успешно обновлены.';
        return $createdAttributes;
    }
}
