@extends('dashboard.index')

@section('title', 'Список Smart-решений')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container-fluid">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Раздел</th>
                            <th>Описание</th>
                        </tr>
                    </thead>
                    <tbody class="table__body">
                        @foreach ($smartSolutions as $smartSolution)
                            <tr>
                                <td>{{ $smartSolution->id }}</td>
                                <td>{{ $smartSolution->section->title }}</td>
                                <td><a href="{{ route('smart.solutions.edit.admin.index', $smartSolution) }}">{{ $smartSolution->description }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('smart.solutions.create.admin.index') }}" class="btn btn-success">Добавить Smart-решение</a>
            </div>
        </div>
    </div>
@endsection
