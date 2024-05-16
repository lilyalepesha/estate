@extends('layouts.admin.main')

@section('content')
    <form method="POST" action="{{ route('property.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="value">Свойство проекта</label>
                <input name="value" class="form-control" id="value" placeholder="Введите свойство проекта">
                @error('value')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection
