<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'seo_title' => 'nullable',
            'description' => 'required',
            'characteristics' => 'nullable',
            'seo_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'attribute_title' => 'nullable',
            'attribute_value' => 'nullable',
            'file_url' => 'nullable|mimes:jpg,png,jpeg,webp,svg',
            'brand_id' => 'integer',
            'price' => 'integer',
            'modification' => 'nullable|string',
            'active' => 'nullable',
            'popular' => 'nullable',
            'new' => 'nullable',
            'actual' => 'nullable',
            'recommend' => 'nullable',
            'credit' => 'nullable',
        ];
    }
}
