<?php

namespace App\Services;
use App\Http\Requests\AttributeStoreRequest;
use App\Models\Admin\Attribute;
use Illuminate\Support\Facades\Cache;

class AttributeService
{
    public function createOrUpdateAttributes($attributesData, AttributeStoreRequest $request)
    {
        $createdAttributes = [];
        foreach ($attributesData as $data) {
            if (!(isset($data['id']))) {
                // Создание нового атрибута
                $attribute = new Attribute([
                    'title' => $data['title'],
                    'value' => $data['value']
                ]);
                $attribute->save();
                $createdAttributes[] = $attribute;
            } else {
                $locale = $request->input('getlocale');
                app()->setLocale($locale);
                // Поиск атрибута по ID
                $id = $data['id'];
                $existingAttribute = Attribute::find($id);

                if ($existingAttribute) {
                    // Если атрибут существует, обновляем его
                    $existingAttribute->update([
                        'title' => $data['title'],
                        'value' => $data['value']
                    ]);
                    $createdAttributes[] = $existingAttribute;
                }
            }
        }
        // Сбросить кэш для группы атрибутов
        Cache::forget('attributes');

        return $createdAttributes;
    }
}
