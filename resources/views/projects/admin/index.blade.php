@extends('dashboard.index')

@section('title', 'Список проектов')

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
                            <th>Рубрика</th>
                            <th>Автор</th>
                            <th>Дата создания</th>
                            <th>Модерация</th>
                            <th>Опубликован</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            @if ($project->moderated === null)
                                <tr>
                            @elseif ($project->moderated == 1)
                                <tr class="success">
                            @else
                                <tr class="danger">
                            @endif
                                <td>{{ $project->id }}</td>
                                <td><a class="link" href="{{ route('projects.admin.show', $project) }}">{{ $project->title }}</a></td>
                                <td>
                                    @if($project->rubric)
                                        <a class="link" href="{{ route('rubrics.show', $project->rubric) }}">{{ $project->rubric->name }}</a>
                                    @else
                                        Без рубрики
                                    @endif
                                </td>
                                <td><a class="link" href="{{ route('users.admin.show', $project->user) }}">{{ $project->user->full_name }}</a></td>
                                <td>{{ $project->created_at->format('d.m.Y H:i:s') }}</td>
                                <td>
                                    @if ($project->moderated === null)
                                        Рассматривается
                                    @elseif ($project->moderated == 1)
                                        Одобрен
                                    @else
                                        Отклонён
                                    @endif
                                </td>
                                <td>
                                    {{ $project->published_at ? 'Да' : 'Нет' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $projects->links('layouts.pagination') }}
            </div>
        </div>
    </div>

@endsection
