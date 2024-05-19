@extends('layouts.admin.main')

@section('content')
    <form method="POST" action="{{route('admin.region.update', $region->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Название региона</label>
                <input name="name" class="form-control" id="exampleInputEmail1" placeholder="Введите название региона" value="{{ $region->name }}">
                @error('name')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Улица</label>
                <input name="street" class="form-control" id="exampleInputEmail1" placeholder="Введите улицу" value="{{ $region->street }}">
                @error('street')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Область</label>
                <input name="area" class="form-control" id="exampleInputEmail1" placeholder="Введите область">
                @error('area')
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
