<?php

namespace App\Http\Requests\PickUpPoint;

use Illuminate\Foundation\Http\FormRequest;

class PickUpPointRequest extends FormRequest
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
            'link' => 'string|nullable',
            'city' => 'string',
            'address' => 'string',
        ];
    }
}
