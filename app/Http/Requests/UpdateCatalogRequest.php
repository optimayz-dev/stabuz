<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCatalogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];

        // Перебираем поля, которые начинаются с 'title_' и добавляем правило 'required'
        foreach ($this->request->all() as $key => $value) {
            if (str_starts_with($key, 'title_')) {
                $catalogId = substr($key, strlen('title_'));
                $rules[$key] = 'required';
                $rules['seo_title_' . $catalogId] = 'required';
                $rules['seo_description_' . $catalogId] = 'required';
                $rules['meta_keywords_' . $catalogId] = 'required';
            }
        }
        return $rules;
    }
}
