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
            'seo_title' => 'required',
            'description' => 'required',
            'seo_description' => 'required',
            'meta_keywords' => 'required',
            'attribute_title' => 'required',
            'attribute_value' => 'required',
            'file_url' => 'required'
        ];
    }
}
