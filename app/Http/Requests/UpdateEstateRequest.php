<?php

namespace App\Http\Requests;

use App\Enums\ProjectTypeEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateEstateRequest extends FormRequest
{
    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => Auth::id(),
        ]);

        $this->mergeIfMissing([
            'verified' => false
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
            'description' => ['required', 'string', 'min:3', 'max:1000'],
            'region_id' => ['required', 'integer', 'exists:regions,id'],
            'price' => ['required', 'string', 'min:1'],
            'type' => ['required', 'integer', Rule::enum(ProjectTypeEnum::class)],
            'total_area' => ['required', 'string', 'min:1'],
            'living_space' => ['required', 'string', 'min:1'],
            'properties' => ['nullable', 'array'],
            'properties.*' => ['required', 'string', 'exists:properties,value'],
            'images' => ['nullable', 'array'],
            'images.*' => ['required', 'file', 'image', 'max:10000'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'verified' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Get custom attribute names.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'description' => 'описание',
            'region_id' => 'регион',
            'price' => 'цена',
            'type' => 'тип проекта',
            'total_area' => 'общая площадь',
            'living_space' => 'жилая площадь',
            'properties' => 'свойства',
            'properties.*' => 'свойство',
            'images' => 'изображения',
            'images.*' => 'изображение',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'description.required' => 'Поле :attribute обязательно для заполнения.',
            'description.string' => 'Поле :attribute должно быть строкой.',
            'description.min' => 'Поле :attribute должно содержать как минимум :min символов.',
            'description.max' => 'Поле :attribute не должно превышать :max символов.',
            'region_id.required' => 'Поле :attribute обязательно для заполнения.',
            'region_id.integer' => 'Поле :attribute должно быть целым числом.',
            'region_id.exists' => 'Выбранный :attribute не существует.',
            'price.required' => 'Поле :attribute обязательно для заполнения.',
            'price.integer' => 'Поле :attribute должно быть целым числом.',
            'price.min' => 'Поле :attribute должно быть не менее :min.',
            'type.required' => 'Поле :attribute обязательно для заполнения.',
            'type.integer' => 'Поле :attribute должно быть целым числом.',
            'total_area.required' => 'Поле :attribute обязательно для заполнения.',
            'total_area.integer' => 'Поле :attribute должно быть целым числом.',
            'total_area.min' => 'Поле :attribute должно быть не менее :min.',
            'living_space.required' => 'Поле :attribute обязательно для заполнения.',
            'living_space.integer' => 'Поле :attribute должно быть целым числом.',
            'living_space.min' => 'Поле :attribute должно быть не менее :min.',
            'properties.array' => 'Поле :attribute должно быть массивом.',
            'properties.*.required' => 'Поле :attribute обязательно для заполнения.',
            'properties.*.string' => 'Поле :attribute должно быть строкой.',
            'properties.*.exists' => 'Выбранный :attribute не существует.',
            'images.array' => 'Поле :attribute должно быть массивом.',
            'images.*.required' => 'Поле :attribute обязательно для заполнения.',
            'images.*.file' => 'Поле :attribute должно быть файлом.',
            'images.*.image' => 'Поле :attribute должно быть изображением.',
            'images.*.max' => 'Поле :attribute не должно превышать :max килобайт.',
        ];
    }
}
