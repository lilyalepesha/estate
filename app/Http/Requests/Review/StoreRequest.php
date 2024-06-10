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
            'rating' => 3,
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
}
