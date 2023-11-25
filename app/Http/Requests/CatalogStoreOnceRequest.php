<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatalogStoreOnceRequest extends FormRequest
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
            'category_img' => 'mimes:jpg,png,jpeg,webp,svg|nullable',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заполните заговок !',
            'category_img.mimes' => 'Картинка должна быть в формате jpg,png,jpeg,webp,svg !'
        ];
    }
}
