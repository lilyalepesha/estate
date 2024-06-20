<?php

namespace App\Http\Requests;

use App\Enums\ProjectTypeEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreEstateRequest extends FormRequest
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
            'verified' => false,
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
            'phone' => ['required', 'string', 'regex:/^\+375\d{9}$/'],
            'description' => ['required', 'string', 'min:3', 'max:1000'],
            'region' => ['required', 'string'],
            'area' => ['required', 'string'],
            'street' => ['required', 'string'],
            'price' => ['required', 'integer', 'min:1'],
            'type' => ['required', 'integer', Rule::enum(ProjectTypeEnum::class)],
            'total_area' => ['required', 'integer', 'min:1'],
            'living_space' => ['required', 'integer', 'min:1'],
            'properties' => ['nullable', 'array'],
            'properties.*' => ['required', 'string', 'exists:properties,value'],
            'images' => ['nullable', 'array'],
            'images.*' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10000'],
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
            'region' => 'регион',
            'house' => 'дом',
            'area' => 'район',
            'street' => 'улица',
            'price' => 'цена',
            'type' => 'тип проекта',
            'total_area' => 'общая площадь',
            'living_space' => 'жилая площадь',
            'properties' => 'свойства',
            'properties.*' => 'свойство',
            'images' => 'изображения',
            'images.*' => 'изображение',
            'phone' => 'телефон',
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
            'phone.required' => 'Поле :attribute обязательно для заполнения.',
            'phone.string' => 'Поле :attribute должно быть строкой.',
            'phone.regex' => 'Поле :attribute должно быть в формате +375XXXXXXXXX.',
            'description.required' => 'Поле :attribute обязательно для заполнения.',
            'description.string' => 'Поле :attribute должно быть строкой.',
            'description.min' => 'Поле :attribute должно содержать как минимум :min символов.',
            'description.max' => 'Поле :attribute не должно превышать :max символов.',
            'region.required' => 'Поле :attribute обязательно для заполнения.',
            'region.string' => 'Поле :attribute должно быть строкой.',
            'house.required' => 'Поле :attribute обязательно для заполнения.',
            'house.string' => 'Поле :attribute должно быть строкой.',
            'area.required' => 'Поле :attribute обязательно для заполнения.',
            'area.string' => 'Поле :attribute должно быть строкой.',
            'street.required' => 'Поле :attribute обязательно для заполнения.',
            'street.string' => 'Поле :attribute должно быть строкой.',
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
            'images.*.mimes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
            'images.*.max' => 'Поле :attribute не должно превышать :max килобайт.',
            'user_id.required' => 'Поле :attribute обязательно для заполнения.',
            'user_id.integer' => 'Поле :attribute должно быть целым числом.',
            'user_id.exists' => 'Выбранный :attribute не существует.',
            'verified.boolean' => 'Поле :attribute должно быть булевым значением.',
        ];
    }
}
