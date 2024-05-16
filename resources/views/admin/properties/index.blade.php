@extends('layouts.admin.main')


@section('content')
    <div class="container m-3">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('property.create') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm float-start">Добавить</button>
                </form>
            </div>
        </div>
    </div>
    <table class="table pt-5">
        <thead>
        <tr>
            <th scope="col">Название</th>
        </tr>
        </thead>
        <tbody>
        @foreach($properties as $property)
            <tr style="display: flex; align-content: flex-start; justify-content: flex-start">
                <td>{{ $property->value }}</td>
                    <form action="{{route('property.edit', $property->id)}}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-primary float-end btn-sm">Редактировать</button>
                    </form>
                </td>

                <td>
                    <form action="{{ route('property.destroy', $property->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-end btn-sm">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $properties->links() }}
    </div>
@endsection
