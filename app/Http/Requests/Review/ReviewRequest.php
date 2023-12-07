<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReviewRequest extends FormRequest
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
            'name' => Rule::requiredIf(!auth('web')->user()),
            'email' => Rule::requiredIf(!auth('web')->user()),
            'images.*' => 'nullable|mimes:jpg,jpeg,png',
            'grade' => 'integer|nullable',
            'product_id' => 'integer',
            'user_id' => 'nullable|integer'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно к заполнению !'
        ];
    }
}
