@extends('layouts.app')

@section('title', 'Редактирование проекта')

@section('content')
    @parent
    <div class="section">
        <div class="container">
            <h1 class="title title-xxl">Редактирование проекта</h1>
            <form method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @include('projects.includes.form', ['submitButtonText' => 'Сохранить'])
            </form>
            @cannot('moderate', $project)
                @if(!is_null($project->moderated))
                    <div class="text text_warning">Изменение информации о данном проекте потребует повторной проверки проекта модератором.</div>
                @endif
            @endcannot
            <div class="text"><a class="link" href="{{ route('projects.show', $project) }}">&larr; Вернуться на страницу проекта</a></div>
        </div>
    </div>
@endsection
