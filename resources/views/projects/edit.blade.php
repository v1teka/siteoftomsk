@extends('layouts.app')

@section('title', 'Редактирование проекта')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container-main">
                <h1 class="title title--xxl">Редактирование проекта</h1>
                @include('projects.includes.form',
                    [
                        'submitButtonText' => 'Сохранить',
                        'actionPath' => route('projects.update', $project)
                    ]
                )
                @cannot('administrate', $project)
                    @if(!is_null($project->moderated))
                        <div class="text">Изменение информации о данном проекте потребует повторной проверки проекта модератором.</div>
                    @endif
                @endcannot
                <div class="text"><a class="link" href="{{ route('projects.show', $project) }}">&larr; Вернуться на страницу проекта</a></div>
            </div>
        </div>
    </div>
@endsection
