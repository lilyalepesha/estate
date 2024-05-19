@extends('layouts.admin.main')

@section('content')
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-12 text-end">
                <a href="{{ route('property.create') }}" class="btn btn-success btn-sm">Добавить</a>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col" class="text-end">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->value }}</td>
                    <td class="text-end">
                        <a href="{{ route('property.edit', $property->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                        <form action="{{ route('property.destroy', $property->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {{ $properties->links() }}
        </div>
    </div>
@endsection
