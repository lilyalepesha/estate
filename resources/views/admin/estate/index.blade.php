@extends('layouts.admin.main')

@section('content')
    <div class="container m-3">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.estate.create') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm float-start">Добавить</button>
                </form>
            </div>
        </div>
    </div>
    <table class="table pt-5">
        <thead>
        <tr>
            <th scope="col">Описание</th>
            <th scope="col">Стоимость</th>
            <th scope="col">Общая площадь</th>
            <th scope="col">Жилая площадь</th>
            <th scope="col">Тип</th>
            <th scope="col">Регион</th>
            <th scope="col">Область</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($estates as $estate)
            <tr>
                <td>{{ $estate->description }}</td>
                <td>{{ $estate->price }}</td>
                <td>{{ $estate->total_area }}м<sup>2</sup></td>
                <td>{{ $estate->living_space }}м<sup>2</sup></td>
                <td>{{ \App\Enums\ProjectTypeEnum::tryFrom($estate->type)?->label() }}</td>
                <td> {{ $estate->region->name }}</td>
                <td>{{ $estate->region->area }}</td>
                <td>{{ $estate->created_at }}</td>
                <td>
                    <form action="{{route('admin.estate.edit', $estate->id)}}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-block btn-primary btn-sm">Редактировать</button>
                    </form>
                </td>

                <td>
                    <form action="{{ route('admin.estate.destroy', $estate->id) }}" method="POST">
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
        {{ $estates->links() }}
    </div>
@endsection
