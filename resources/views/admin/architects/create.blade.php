@extends('layouts.admin.main')

@section('content')
    <form method="POST" action="{{ route('admin.architects.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nameInput">Имя</label>
                <input name="name" type="text" class="form-control" id="nameInput" placeholder="Введите имя">
                @error('name')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_nameInput">Фамилия</label>
                <input name="last_name" type="text" class="form-control" id="last_nameInput" placeholder="Введите фамилию">
                @error('last_name')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="father_nameInput">Отчество</label>
                <input name="father_name" type="text" class="form-control" id="father_nameInput" placeholder="Введите отчество">
                @error('father_name')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="emailInput">Email</label>
                <input name="email" class="form-control" id="emailInput" placeholder="Введите email">
                @error('email')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="descriptionInput">Описание</label>
                <input name="description" class="form-control" id="descriptionInput" placeholder="Введите описание">
                @error('description')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="passwordInput">Пароль</label>
                <input name="password" type="password" class="form-control" id="passwordInput" placeholder="Введите пароль">
                @error('password')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="experienceInput">Опыт работы</label>
                <input name="experience" type="text" class="form-control" id="experienceInput" placeholder="Введите опыт работы">
                @error('experience')
                <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group form-check">
                <input name="verified" type="checkbox" class="form-check-input" id="verifiedInput">
                <label class="form-check-label" for="verifiedInput">Подтверждён</label>
                @error('verified')
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
