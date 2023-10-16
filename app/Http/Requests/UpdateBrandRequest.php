<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'title' => 'string',
            'seo_title' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'categories_id' => 'nullable|array',
            'country_id' => 'nullable|integer',
            'brand_logo' => ['nullable', 'mimes:jpg,png,svg,jpeg'],
        ];
    }
}
