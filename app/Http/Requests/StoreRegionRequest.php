<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRegionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2', 'unique:regions,name', 'max:255'],
            'street' => ['required', 'string', 'min:2', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpg,webp,png,jpeg']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения.',
            'name.min' => 'Поле "Имя" должно содержать не менее :min символов.',
            'name.unique' => 'Поле "Имя" должно быть уникальным.',
            'name.max' => 'Поле "Имя" не должно превышать :max символов.',
            'street.required' => 'Поле "Улица" обязательно для заполнения.',
            'street.string' => 'Поле "Улица" должно быть строкой.',
            'street.min' => 'Поле "Улица" должно содержать не менее :min символов.',
            'street.max' => 'Поле "Улица" не должно превышать :max символов.',
            'image.required' => 'Поле "Изображение" обязательно для заполнения.',
            'image.image' => 'Поле "Изображение" должно быть изображением.',
            'image.mimes' => 'Поле "Изображение" должно быть файлом типа: jpg, webp, png, jpeg.'
        ];
    }

    /**
     * Get the custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'street' => 'Улица',
            'image' => 'Изображение'
        ];
    }
}
