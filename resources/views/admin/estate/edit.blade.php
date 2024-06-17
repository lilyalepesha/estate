@extends('layouts.admin.main')

@section('content')
    <form method="POST" action="{{ route('admin.estate.update', $estate->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Описание</label>
                <input name="description" class="form-control" id="exampleInputEmail1" placeholder="Введите описание">
                @error('description')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Стоимость</label>
                <input name="price" class="form-control" id="exampleInputEmail1" placeholder="Введите описание">
                @error('price')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="typeInput">Тип недвижимости</label>
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
                <label for="exampleInputPassword1">Регион</label>
                <select name="region" class="form-control">
                    @foreach(\App\Models\Region::query()->pluck('name', 'id') as $key => $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('region')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="architectEmailInput">Область</label>
                <input name="area" class="form-control" id="exampleInputEmail1" placeholder="Введите область">
                @error('area')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="architectEmailInput">Улица</label>
                <input name="street" class="form-control" id="exampleInputEmail1" placeholder="Введите улицу">
                @error('street')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Общая площадь</label>
                <input name="total_area" class="form-control" id="exampleInputEmail1" placeholder="Введите описание">
                @error('total_area')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Жилая площадь</label>
                <input name="living_space" class="form-control" id="exampleInputEmail1" placeholder="Введите описание">
                @error('living_space')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            @can('is_admin')
                <div class="form-group">
                    <label for="exampleInputEmail1">Статус</label>
                    <select style="outline: none; width: 100%" class="form-control" aria-label="Подвердить" name="verified">
                        <option selected value="0">Не подверждён</option>
                        <option value="1">Подверждён</option>
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
                <label for="properties" class="form-label">Выберите свойства проекта</label>
                <div class="input-group">
                    <select style="outline: none; width: 100%" class="form-control" aria-label="Default select example" multiple name="properties[]">
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
            <button type="submit" class="btn btn-primary">Редактировать</button>
        </div>
    </form>
@endsection

