<?php

namespace App\Http\Requests;

use App\Enums\ProjectTypeEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'min:2', 'string'],
            'type' => ['required', 'integer', Rule::enum(ProjectTypeEnum::class)],
            'architect_id' => ['required', 'integer'],
            'region_id' => ['required', 'integer'],
            'price_per_meter' => ['required', 'numeric'],
            'area' => ['required', 'integer'],
            'images' => ['required', 'array'],
            'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg,bmp', 'max:5120'],
            'properties' => ['required', 'array'],
            'properties.*' => ['required', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Название проекта',
            'description' => 'Описание проекта',
            'type' => 'Тип проекта',
            'architect_id' => 'ID архитектора',
            'region_id' => 'ID региона',
            'price_per_meter' => 'Цена за метр',
            'area' => 'Площадь',
            'image' => 'Изображение проекта',
            'properties' => 'Свойства'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите название проекта',
            'name.min' => 'Название проекта должно содержать минимум :min символа',
            'name.max' => 'Название проекта должно содержать максимум :max символов',
            'name.string' => 'Название проекта должно быть строкой',
            'description.required' => 'Введите описание проекта',
            'description.min' => 'Описание проекта должно содержать минимум :min символа',
            'description.max' => 'Описание проекта должно содержать максимум :max символов',
            'description.string' => 'Описание проекта должно быть строкой',
            'type.required' => 'Выберите тип проекта',
            'type.integer' => 'Тип проекта должен быть числом',
            'type.enum' => 'Выбранный тип проекта недопустим',
            'architect_id.required' => 'Укажите ID архитектора',
            'architect_id.integer' => 'ID архитектора должен быть числом',
            'region_id.required' => 'Укажите ID региона',
            'region_id.integer' => 'ID региона должен быть числом',
            'price_per_meter.required' => 'Укажите цену за метр',
            'price_per_meter.numeric' => 'Цена за метр должна быть числом',
            'area.required' => 'Укажите площадь проекта',
            'area.integer' => 'Площадь проекта должна быть числом',
            'images.*.required' => 'Добавьте изображение',
            'images.*.image' => 'Файл должен быть изображением',
            'images.*.mimes' => 'Изображение должно быть в формате: jpg, jpeg, png, bmp',
            'images.*.max' => 'Размер изображения не должен превышать 5 МБ',
            'images' => 'Добавьте изображение',
            'properties' => 'Свойства обязательны для заполенения'
        ];
    }
}
