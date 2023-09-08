<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryStoreRequest extends FormRequest
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
            'description' => 'nullable',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'category_img' => 'mimes:jpg,png,jpeg,webp,svg',
            'parent_id_hidden' => 'required',
        ];
    }
}
