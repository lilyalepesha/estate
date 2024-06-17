@extends('layouts.admin.main')

@section('content')
    <div class="container m-3" >
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.region.create') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm float-start">Добавить</button>
                </form>
            </div>
        </div>
    </div>
    <table class="table pt-5">
        <thead>
        <tr>
            <th scope="col">Город</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($regions as $region)
            <tr>
                <td>{{ $region->name }}</td>
                <td>{{ $region->created_at }}</td>
                <td>
                    <form action="{{route('admin.region.edit', $region->id)}}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-block btn-primary btn-sm">Редактировать</button>
                    </form>
                </td>

                <td>
                    <form action="{{ route('admin.region.destroy', $region->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-block btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $regions->links() }}
    </div>
@endsection
