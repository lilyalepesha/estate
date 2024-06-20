@extends('layouts.admin.main')

@section('content')
    <form method="POST" action="{{ route('admin.estate.update', $estate->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="form-group">
                <label for="descriptionInput">Описание</label>
                <input name="description" class="form-control" id="descriptionInput" placeholder="Введите описание" value="{{ old('description', $estate->description) }}">
                @error('description')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="priceInput">Стоимость</label>
                <input name="price" class="form-control" id="priceInput" placeholder="Введите стоимость" value="{{ old('price', $estate->price) }}">
                @error('price')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="typeInput">Тип недвижимости</label>
                <select name="type" class="form-control" id="typeInput">
                    @foreach (\App\Enums\ProjectTypeEnum::cases() as $type)
                        <option value="{{ $type->value }}" {{ old('type', $estate->type) == $type->value ? 'selected' : '' }}>{{ $type->label() }}</option>
                    @endforeach
                </select>
                @error('type')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="regionInput">Регион</label>
                <select name="region" class="form-control" id="regionInput">
                    @foreach(\App\Models\Region::query()->pluck('name', 'id')->unique() as $key => $value)
                        <option value="{{ $key }}" {{ old('region', $estate->region->id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @error('region')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phoneInput">Телефон для связи</label>
                <input name="phone" class="form-control" id="phoneInput" placeholder="+375333333333" value="{{ old('phone', $estate->phone) }}">
                @error('phone')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="areaInput">Область</label>
                <input name="area" class="form-control" id="areaInput" placeholder="Введите область" value="{{ old('area', $estate->region?->area) }}">
                @error('area')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="streetInput">Улица</label>
                <input name="street" class="form-control" id="streetInput" placeholder="Введите улицу" value="{{ old('street', $estate->region?->street) }}">
                @error('street')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="totalAreaInput">Общая площадь</label>
                <input name="total_area" class="form-control" id="totalAreaInput" placeholder="Введите общую площадь" value="{{ old('total_area', $estate->total_area) }}">
                @error('total_area')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="livingSpaceInput">Жилая площадь</label>
                <input name="living_space" class="form-control" id="livingSpaceInput" placeholder="Введите жилую площадь" value="{{ old('living_space', $estate->living_space) }}">
                @error('living_space')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            @can('is_admin')
                <div class="form-group">
                    <label for="verifiedInput">Статус</label>
                    <select style="outline: none; width: 100%" class="form-control" aria-label="Подтвердить" name="verified" id="verifiedInput">
                        <option value="0" {{ old('verified', $estate->verified) == 0 ? 'selected' : '' }}>Не подтверждён</option>
                        <option value="1" {{ old('verified', $estate->verified) == 1 ? 'selected' : '' }}>Подтверждён</option>
                    </select>
                    @error('verified')
                    <span class="red">{{ $message }}</span>
                    @enderror
                </div>
            @endcan

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
                <label for="propertiesInput" class="form-label">Выберите свойства проекта</label>
                <div class="input-group">
                    <select style="outline: none; width: 100%" class="form-control" aria-label="Default select example" multiple name="properties[]" id="propertiesInput">
                        @foreach($properties as $property)
                            <option value="{{ $property }}" {{ collect(old('properties', $estate->properties))->contains($property) ? 'selected' : '' }}>{{ $property }}</option>
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
            <button type="submit" class="btn btn-primary">Редактировать</button>
        </div>
    </form>
@endsection
