<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'unique:users', 'max:50'],
            'password' => ['required', 'confirmed', 'min:8', 'max:50'],
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
            'email.required' => 'Поле :attribute обязательно для заполнения',
            'email.email' => 'Поле :attribute должно быть действительным email адресом',
            'email.unique' => 'Пользователь с таким :attribute уже существует',
            'email.max' => 'Длина :attribute не должна превышать :max символов',
            'password.required' => 'Поле :attribute обязательно для заполнения',
            'password.confirmed' => 'Пароли не совпадают',
            'password.min' => 'Длина :attribute должна быть не менее :min символов',
            'password.max' => 'Длина :attribute не должна превышать :max символов',
            'avatar.required' => 'Поле :attribute обязательно для заполнения',
            'avatar.image' => 'Файл :attribute должен быть изображением',
            'avatar.mimes' => 'Допустимые форматы файла: jpeg, png, jpg',
            'avatar.max' => 'Размер :attribute не должен превышать :max Кб'
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
            'avatar' => 'Аватар'
        ];
    }
}
