<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRegionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:2',
                'max:255',
                Rule::unique('regions')->where(function ($query) {
                    return $query->where('area', $this->input('area'));
                })
            ],
            'street' => ['required', 'string', 'min:2', 'max:255'],
            'area' => ['required', 'string', 'min:2', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,webp,png,jpeg']
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
            'name.max' => 'Поле "Имя" не должно превышать :max символов.',
            'street.required' => 'Поле "Улица" обязательно для заполнения.',
            'street.string' => 'Поле "Улица" должно быть строкой.',
            'street.min' => 'Поле "Улица" должно содержать не менее :min символов.',
            'street.max' => 'Поле "Улица" не должно превышать :max символов.',
            'area.required' => 'Поле "Регион" обязательно для заполнения.',
            'area.string' => 'Поле "Регион" должно быть строкой.',
            'area.min' => 'Поле "Регион" должно содержать не менее :min символов.',
            'area.max' => 'Поле "Регион" не должно превышать :max символов.',
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
            'area' => 'Область',
            'image' => 'Изображение'
        ];
    }
}
