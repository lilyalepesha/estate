<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateArchitectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'last_name' =>  ['required', 'string', 'min:2', 'max:255'],
            'father_name' =>  ['required', 'string', 'min:2', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'string'],
            'experience' => ['required', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp']
        ];
    }

    /**
     * Get the attributes' names for the defined validation rules.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'last_name' => 'Фамилия',
            'father_name' => 'Отчество',
            'description' => 'Описание',
            'email' => 'Email',
            'password' => 'Пароль',
            'experience' => 'Опыт работы',
            'verified' => 'Подтверждение',
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
            'name.required' => 'Поле имя обязательно для заполнения.',
            'name.string' => 'Поле имя должно быть строкой.',
            'name.min' => 'Поле имя должно содержать как минимум :min символа.',
            'name.max' => 'Поле имя не должно превышать :max символов.',
            'last_name.required' => 'Поле имя обязательно для заполнения.',
            'last_name.string' => 'Поле имя должно быть строкой.',
            'last_name.min' => 'Поле имя должно содержать как минимум :min символа.',
            'last_name.max' => 'Поле имя не должно превышать :max символов.',
            'father_name.required' => 'Поле отчество обязательно для заполнения.',
            'father_name.string' => 'Поле отчество должно быть строкой.',
            'father_name.min' => 'Поле отчество должно содержать как минимум :min символа.',
            'father_name.max' => 'Поле отчество не должно превышать :max символов.',
            'description.required' => 'Поле описание обязательно для заполнения.',
            'description.string' => 'Поле описание должно быть строкой.',
            'description.max' => 'Поле описание не должно превышать :max символов.',
            'email.required' => 'Поле email обязательно для заполнения.',
            'email.unique' => 'Такой email уже существует.',
            'email.email' => 'Некорректный формат email.',
            'password.required' => 'Поле пароль обязательно для заполнения.',
            'password.min' => 'Поле пароль должно содержать как минимум :min символов.',
            'password.string' => 'Поле пароль должно быть строкой.',
            'experience.required' => 'Поле опыт работы обязательно для заполнения.',
            'experience.string' => 'Поле опыт работы должно быть строкой.',
            'experience.max' => 'Поле опыт работы не должно превышать :max символов.',
            'image.required' => 'Добавьте изображение',
            'image.image' => 'Файл должен быть изображением',
            'image.mimes' => 'Изображение должно быть в формате: jpg, jpeg, png, webp'
        ];
    }
}
