@extends('layouts.admin.main')


@section('content')
    <div class="container m-3" >
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.project.create') }}" method="GET">
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
            <th scope="col">Описание</th>
            <th scope="col">Архитектор</th>
            <th scope="col">Регион</th>
            <th scope="col">Тип</th>
            <th scope="col">Стоимость</th>
            <th scope="col">Площадь</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->architect?->email }}</td>
                <td>{{ $project->region?->name }}</td>
                <td>{{ \App\Enums\ProjectTypeEnum::tryFrom($project->type)?->label() }}</td>
                <td> {{ $project->price }}</td>
                <td> {{ $project->area }} м<sup>2</sup></td>
                <td>{{ $project->created_at }}</td>
                <td>
                    <form action="{{route('admin.project.edit', $project->id)}}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-block btn-primary btn-sm">Редактировать</button>
                    </form>
                </td>

                <td>
                    <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST">
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
        {{ $projects->links() }}
    </div>
@endsection
