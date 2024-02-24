<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ArchitectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'father_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:architects,email'],
            'password' => ['required', 'min:8'],
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
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
            'name.required' => 'Поле :attribute обязательно для заполнения.',
            'name.string' => 'Поле :attribute должно быть строкой.',
            'name.max' => 'Поле :attribute не должно превышать :max символов.',
            'name.min' => 'Поле :attribute должно содержать как минимум :min символов.',
            'last_name.required' => 'Поле :attribute обязательно для заполнения.',
            'last_name.string' => 'Поле :attribute должно быть строкой.',
            'last_name.max' => 'Поле :attribute не должно превышать :max символов.',
            'last_name.min' => 'Поле :attribute должно содержать как минимум :min символов.',
            'father_name.required' => 'Поле :attribute обязательно для заполнения.',
            'father_name.string' => 'Поле :attribute должно быть строкой.',
            'father_name.max' => 'Поле :attribute не должно превышать :max символов.',
            'father_name.min' => 'Поле :attribute должно содержать как минимум :min символов.',
            'email.required' => 'Поле :attribute обязательно для заполнения.',
            'email.email' => 'Поле :attribute должно быть действительным адресом электронной почты.',
            'email.max' => 'Поле :attribute не должно превышать :max символов.',
            'email.unique' => 'Поле :attribute должно быть уникальным',
            'password.required' => 'Поле :attribute обязательно для заполнения.',
            'password.min' => 'Поле :attribute должно содержать как минимум :min символов.',
            'avatar.required' => 'Поле :attribute обязательно для заполнения.',
            'avatar.image' => 'Поле :attribute должно быть изображением.',
            'avatar.mimes' => 'Поле :attribute должно иметь расширение jpeg, png или jpg.',
            'avatar.max' => 'Поле :attribute не должно превышать :max килобайт.'
        ];
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Пароль',
            'password_confirmation' => 'Подтверждение пароля',
            'avatar' => 'Аватар',
            'last_name' => 'Фамилия',
            'father_name' => 'Отчество'
        ];
    }
}
