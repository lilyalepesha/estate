@extends('layouts.admin.main')

@section('content')
    <form method="POST" action="{{route('admin.architects.update', $architect->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Имя</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Введите имя" value="{{$architect->name}}">
                @error('name')
                    <span class="red">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Фамилия</label>
                <input name="last_name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Введите фамилию" value="{{$architect->last_name}}">
                @error('last_name')
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
                <label for="exampleInputPassword1">Отчество</label>
                <input name="father_name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Введите отчество" value="{{$architect->father_name}}">
                @error('father_name')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" class="form-control" id="exampleInputEmail1" placeholder="Введите email" value="{{$architect->email}}">
                @error('email')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль" value="{{$architect->password}}">
                @error('password')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Опыт работы</label>
                <input name="experience" type="text" class="form-control" id="exampleInputPassword1" placeholder="Введите опыт" value="{{$architect->experience}}">
                @error('experience')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group form-check">
                <input name="verified" type="checkbox" class="form-check-input" id="verifiedInput" @if($architect->verified) checked @endif>
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
            <button type="submit" class="btn btn-primary">Отредактировать</button>
        </div>
    </form>
@endsection
