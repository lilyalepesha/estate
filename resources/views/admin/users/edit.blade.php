@extends('layouts.admin.main')

@section('content')
    <form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Имя</label>
                <input name="name" class="form-control" id="exampleInputEmail1" placeholder="Введите имя"
                       value="{{ $user->name }}">
                @error('name')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Фамилия</label>
                <input name="surname" class="form-control" id="exampleInputEmail1" placeholder="Введите фамилию">
                @error('surname')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Отчество</label>
                <input name="father_name" class="form-control" id="exampleInputEmail1" placeholder="Введите отчество">
                @error('father_name')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Номер телефона</label>
                <input name="phone" class="form-control" id="exampleInputEmail1" placeholder="Введите номер телефона">
                @error('phone')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" class="form-control" id="exampleInputEmail1" placeholder="Введите email"
                       value="{{$user->email}}">
                @error('email')
                <span class="red">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                       placeholder="Введите пароль" value="{{$user->password}}">
                @error('password')
                <span class="red">{{$message}}</span>
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
            <button type="submit" class="btn btn-primary">Отредактировать</button>
        </div>
    </form>
@endsection
