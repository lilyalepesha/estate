@extends('layouts.admin.main')

@section('content')
    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Имя</label>
                <input name="name" class="form-control" id="exampleInputEmail1" placeholder="Введите имя">
                @error('name')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" class="form-control" id="exampleInputEmail1" placeholder="Введите email">
                @error('email')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                       placeholder="Пароль">
                @error('password')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Роль</label>
                <select name="role" class="form-control">
                    @foreach(\App\Enums\RoleEnum::cases() as $type)
                        <option value="{{ $type->value }}">{{ $type->label() }}</option>
                    @endforeach
                </select>
                @error('role')
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
