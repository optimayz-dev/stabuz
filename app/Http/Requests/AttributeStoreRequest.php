<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'addmore.*.title' => 'required|unique:attribute_translations,title',
            'addmore.*.value' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'addmore.*.title.required' => 'Поле "Название" обязательно для заполнения.',
            'addmore.*.title.unique' => 'Атрибут с таким названием уже существует.',
            'addmore.*.value.required' => 'Поле "Значение" обязательно для заполнения.',
        ];
    }
}
