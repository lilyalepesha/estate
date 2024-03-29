@extends('layouts.admin.main')

@section('content')
    <form method="POST" action="{{ route('admin.region.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Название региона</label>
                <input name="name" class="form-control" id="exampleInputEmail1" placeholder="Введите название региона">
                @error('name')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Улица</label>
                <input name="street" class="form-control" id="exampleInputEmail1" placeholder="Введите улицу">
                @error('street')
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
