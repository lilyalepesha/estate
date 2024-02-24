@extends('layouts.admin.main')

@section('content')
    @if(!auth()->guard('architects')->check())
        <div class="container m-3" >
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.architects.create') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm float-start">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
    <table class="table pt-5">
        <thead>
        <tr>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Отчество</th>
            <th scope="col">Email</th>
            <th scope="col">Описание</th>
            <th scope="col">Опыт</th>
            <th scope="col">Подтверждён</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Редактировать</th>
            @if(!auth()->guard('architects')->check())
                <th scope="col">Удалить</th>
            @endif
        </tr>
        </thead>
        <tbody>

        @foreach($architects as $architect)
            <tr>
                <td>{{ $architect->name }}</td>
                <td>{{ $architect->last_name }}</td>
                <td>{{ $architect->father_name }}</td>
                <td>{{ $architect->email }}</td>
                <td>{{ $architect->description }}</td>
                <td>{{ $architect->experience }}</td>
                <td>{{ $architect->verified ? 'Да' : 'Нет' }}</td>
                <td>{{ $architect->created_at }}</td>

                @if((auth()->guard('architects')->check() && auth()->guard('architects')->user()->id === $architect->id) || auth()->check())
                    <td>
                        <form action="{{ route('admin.architects.edit', $architect->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-block btn-primary btn-sm">Редактировать</button>
                        </form>
                    </td>
                @endif

                @if(!auth()->guard('architects')->check())
                    <td>
                        <form action="{{ route('admin.architects.destroy', $architect->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-block btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table
@endsection
