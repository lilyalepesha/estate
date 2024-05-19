<?php

namespace App\Http\Requests\User;

use App\Enums\RoleEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'min:12', 'max:255', 'unique:users,phone'],
            'surname' => ['nullable', 'string', 'max:255'],
            'father_name' => ['nullable', 'string', 'max:255'],
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
            'phone' => 'Телефон',
            'surname' => 'Фамилия',
            'father_name' => 'Отчество',
            'password' => 'Пароль',
            'name' => 'Имя',
            'role' => 'Роль',
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
            'email.unique' => 'Поле :attribute должно быть уникальным.',
            'phone.string' => 'Поле :attribute должно быть строкой.',
            'phone.min' => 'Поле :attribute минимум должно содержать :min символов.',
            'phone.max' => 'Поле :attribute не должно превышать :max символов.',
            'phone.unique' => 'Поле :attribute должно быть уникальным.',
            'surname.string' => 'Поле :attribute должно быть строкой.',
            'surname.max' => 'Поле :attribute не должно превышать :max символов.',
            'father_name.string' => 'Поле :attribute должно быть строкой.',
            'father_name.max' => 'Поле :attribute не должно превышать :max символов.',
            'password.required' => 'Поле :attribute обязательно для заполнения.',
            'password.min' => 'Поле :attribute должно содержать как минимум :min символов.',
            'password.max' => 'Поле :attribute не должно превышать :max символов.',
            'name.required' => 'Поле :attribute обязательно для заполнения.',
            'name.string' => 'Поле :attribute должно быть строкой.',
            'name.min' => 'Поле :attribute должно содержать как минимум :min символов.',
            'name.max' => 'Поле :attribute не должно превышать :max символов.',
            'role.required' => 'Поле :attribute обязательно для заполнения.',
            'role.integer' => 'Поле :attribute должно быть числом.',
            'image.required' => 'Добавьте изображение.',
            'image.image' => 'Файл должен быть изображением.',
            'image.mimes' => 'Изображение должно быть в формате: jpg, jpeg, png, webp.'
        ];
    }
}
