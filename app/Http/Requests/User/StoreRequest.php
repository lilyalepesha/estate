<?php

namespace App\Http\Requests\User;

use App\Enums\RoleEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:255'],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'role' => ['required', 'integer', Rule::enum(RoleEnum::class)],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp']
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Пароль',
            'name' => 'Имя',
            'image' => 'Аватар'
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
            'email.required' => 'Поле :attribute обязательно для заполнения.',
            'email.email' => 'Поле :attribute должно быть действительным адресом электронной почты.',
            'email.max' => 'Поле :attribute не должно превышать :max символов.',
            'password.required' => 'Поле :attribute обязательно для заполнения.',
            'password.min' => 'Поле :attribute должно содержать как минимум :min символов.',
            'password.max' => 'Поле :attribute не должно превышать :max символов.',
            'name.required' => 'Поле :attribute обязательно для заполнения.',
            'name.string' => 'Поле :attribute должно быть строкой.',
            'name.min' => 'Поле :attribute должно содержать как минимум :min символов.',
            'name.max' => 'Поле :attribute не должно превышать :max символов.',
            'email.unique' => 'Поле :attribute должно быть уникальным',
            'image.required' => 'Добавьте изображение',
            'image.image' => 'Файл должен быть изображением',
            'image.mimes' => 'Изображение должно быть в формате: jpg, jpeg, png, webp'
        ];
    }
}
