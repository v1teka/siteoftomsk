@extends('dashboard.index')

@section('title', 'Список рубрик')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container-fluid">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Количество проектов</th>
                        </tr>
                    </thead>
                    <tbody class="table__body">
                        @foreach ($rubrics as $rubric)
                            <tr>
                                <td>{{ $rubric->id }}</td>
                                <td><a class="link" href="{{ route('rubrics.show', $rubric) }}">{{ $rubric->name }}</a></td>
                                <td>{{ $rubric->description }}</td>
                                <td>{{ $rubric->projects->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('rubrics.create') }}" class="btn btn-success">Добавить рубрику</a>
                {{ $rubrics->links('layouts.pagination') }}
            </div>
        </div>
    </div>
@endsection
