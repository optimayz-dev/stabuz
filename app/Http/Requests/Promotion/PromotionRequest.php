<?php

namespace App\Http\Requests\Promotion;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'seo_title' => 'string|nullable',
            'seo_description' => 'string|nullable',
            'meta_keywords' => 'string|nullable',
            'image' => 'nullable|mimes:jpg,png,jpeg,webp,svg',
        ];
    }
}
