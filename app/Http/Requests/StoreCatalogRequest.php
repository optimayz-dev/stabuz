<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCatalogRequest extends FormRequest
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
        return [
            'addmore.*.title' => 'required',
            'addmore.*.seo_title' => 'nullable',
            'addmore.*.seo_description' => 'nullable',
            'addmore.*.description' => 'nullable',
            'addmore.*.meta_keywords' => 'nullable',
        ];
    }
}
