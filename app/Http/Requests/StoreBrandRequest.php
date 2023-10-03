<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'seo_title' => 'string',
            'seo_description' => 'string',
            'description' => 'string',
            'meta_keywords' => 'string',
            'categories_id' => 'nullable|array',
            'brand_logo' => ['required', 'mimes:jpg,png,svg,jpeg'],
        ];
    }
}
