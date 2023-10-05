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
            'seo_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'attribute_title' => 'nullable',
            'attribute_value' => 'nullable',
            'file_url' => 'required',
            'brand_id' => 'integer',
            'price' => 'integer',
            'modification' => 'nullable|string',
        ];
    }
}
