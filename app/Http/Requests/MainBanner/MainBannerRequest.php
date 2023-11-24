<?php

namespace App\Http\Requests\MainBanner;

use Illuminate\Foundation\Http\FormRequest;

class MainBannerRequest extends FormRequest
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
            'type' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,webp,svg',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заполните поле заголовок !',
            'type.required' => 'Выберите тип баннера !',
            'image.mimes' => 'Картинка должна быть в формате jpg,png,jpeg,webp,svg'
        ];
    }
}
