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
        // Массив правил для каждого поля в зависимости от индекса (названия) добавляемого атрибута
        $rules = [];

        foreach ($this->input('addmore') as $index => $data) {
            $rules["addmore.{$index}.title"] = 'required|unique:attributes,title';
            $rules["addmore.{$index}.value"] = 'required';
        }

        return $rules;
    }
    public function messages()
    {
        return [
            'addmore.*.title.required' => 'Поле title обязательно для заполнения.',
            'addmore.*.title.unique' => 'Выберите другое название атрибута, такой атрибут уже существует.',
            'addmore.*.value.required' => 'Поле value обязательно для заполнения.',
        ];
    }
}
