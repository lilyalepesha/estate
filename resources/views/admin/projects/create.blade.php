@extends('layouts.admin.main')

@section('content')
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
                <label for="image" class="form-label">Выберите фото</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="image" name="image">
                    <label class="input-group-text" for="image">Загрузить</label>
                </div>
                @error('image')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection
