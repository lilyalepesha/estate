@extends('layouts.admin.main')

@section('content')
    <form method="POST" action="{{ route('property.update', $property->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="form-group">
                <label for="value">Свойство проекта</label>
                <input value="{{ $property->value }}" name="value" class="form-control" id="value" placeholder="Введите свойство проекта">
                @error('value')
                    <span class="red">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Редактироватья</button>
        </div>
    </form>
@endsection
