@extends('layouts.admin.main')

@section('content')
    <script>
        // Получаем все кастомные селекты
        const customSelects = document.querySelectorAll('.custom-select');

        // Для каждого кастомного селекта добавляем обработчик события клика
        customSelects.forEach(select => {
            const originalSelect = select.querySelector('select');
            const customOptions = Array.from(originalSelect.options).map(option => {
                return `<div class="custom-option" data-value="${option.value}">${option.textContent}</div>`;
            }).join('');

            // Создаем кастомное выпадающее меню
            const customDropdown = document.createElement('div');
            customDropdown.className = 'custom-dropdown';
            customDropdown.innerHTML = customOptions;
            select.appendChild(customDropdown);

            // При клике на кастомный селект открываем или закрываем выпадающее меню
            select.addEventListener('click', () => {
                select.classList.toggle('open');
            });

            // При клике на кастомную опцию выбираем её и закрываем выпадающее меню
            customDropdown.addEventListener('click', (e) => {
                if (e.target.classList.contains('custom-option')) {
                    const value = e.target.dataset.value;
                    originalSelect.value = value;
                    select.querySelector('.custom-select-label').textContent = e.target.textContent;
                    select.classList.remove('open');
                }
            });

            // При выборе опции в оригинальном селекте обновляем текст в кастомном селекте
            originalSelect.addEventListener('change', () => {
                const selectedOption = originalSelect.options[originalSelect.selectedIndex];
                select.querySelector('.custom-select-label').textContent = selectedOption.textContent;
            });
        });
    </script>
    <style>
        /* Скрытие оригинального select */
        .custom-select select {
            display: none;
        }

        /* Стилизация кастомного select */
        .custom-select {
            position: relative;
            width: 200px;
        }

        .custom-select select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            font-size: 14px;
            font-family: Arial, sans-serif;
            cursor: pointer;
        }

        /* Стилизация стрелки */
        .custom-select::after {
            content: '\25BC'; /* стрелка вниз */
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none; /* отключение событий мыши */
        }
    </style>

    <form method="POST" action="{{ route('admin.project.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Название проекта</label>
                <input name="name" class="form-control" id="exampleInputEmail1" placeholder="Введите название проекта">
                @error('name')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Описание</label>
                <input name="description" class="form-control" id="exampleInputEmail1" placeholder="Введите описание">
                @error('description')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Стоимость</label>
                <input name="price_per_meter" class="form-control" id="exampleInputEmail1" placeholder="Введите описание">
                @error('price_per_meter')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Площадь</label>
                <input name="area" class="form-control" id="exampleInputEmail1" placeholder="Введите описание">
                @error('area')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="typeInput">Тип проекта</label>
                <select name="type" class="form-control" id="typeInput">
                    @foreach (\App\Enums\ProjectTypeEnum::cases() as $type)
                        <option value="{{ $type->value }}">{{ $type->label() }}</option>
                    @endforeach
                </select>
                @error('type')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="architectEmailInput">Архитектор</label>
                <select name="architect_id" class="form-control" id="architectEmailInput">
                    @foreach (\App\Models\Architect::query()->pluck('email', 'id') as $id => $email)
                        <option value="{{ $id }}">{{ $email }}</option>
                    @endforeach
                </select>
                @error('architect_id')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="architectEmailInput">Регион</label>
                <select name="region_id" class="form-control" id="architectEmailInput">
                    @foreach (\App\Models\Region::query()->pluck('name', 'id') as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                @error('region_id')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Выберите изображения</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="image" name="images[]" multiple>
                    <label class="input-group-text" for="image">Загрузить</label>
                </div>
                @error('images.*')
                    <span class="red">{{ $message }}</span>
                @enderror
                @error('images')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="properties" class="form-label">Выберите свойства проекта</label>
                <div class="input-group">
                    <select style="outline: none; width: 100%" class="form-select" aria-label="Default select example" multiple name="properties[]">
                        @foreach($properties as $property)
                            <option value="{{ $property }}">{{ $property }}</option>
                        @endforeach
                    </select>
                </div>
                @error('properties.*')
                    <span class="red">{{ $message }}</span>
                @enderror
                @error('properties')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection

