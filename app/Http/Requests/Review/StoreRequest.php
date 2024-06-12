<?php

namespace App\Http\Requests\Review;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => Auth::id(),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'text' => ['required', 'string'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'user_id' => ['nullable', 'integer', 'exists:users,id'],
            'architect_id' => ['required', 'integer', 'exists:architects,id'],
        ];
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'text.required' => 'Пожалуйста, введите текст комментария.',
            'text.string' => 'Текст комментария должен быть строкой.',
            'rating.required' => 'Пожалуйста, укажите рейтинг.',
            'rating.integer' => 'Рейтинг должен быть числом.',
            'rating.min' => 'Рейтинг не может быть меньше 1.',
            'rating.max' => 'Рейтинг не может быть больше 5.',
            'user_id.integer' => 'Идентификатор пользователя должен быть числом.',
            'user_id.exists' => 'Указанный пользователь не существует.',
            'architect_id.required' => 'Пожалуйста, укажите идентификатор архитектора.',
            'architect_id.integer' => 'Идентификатор архитектора должен быть числом.',
            'architect_id.exists' => 'Указанный архитектор не существует.',
        ];
    }

}
