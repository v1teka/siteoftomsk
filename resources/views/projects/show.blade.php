@extends('layouts.app')

@section('title', $project->title)
@section('description', $project->description)

@section('content')
    @parent
    <div class="section project">
        <div class="project__header" style="background:url('{{ Storage::disk('public')->url($project->image) }}') no-repeat center center; background-size: cover;">
            <div class="container project__container">
                <h1 class="title project__title">{{ $project->title }}</h1>
                <p class="project__description">{{ $project->description }}</p>
                @isset($project->rubric)
                    <p class="project__rubric"><a class="link" href="{{ route('rubrics.show', $project->rubric) }}">{{ $project->rubric->name }}</a></p>
                @endisset
                @isset($project->form)
                    <p class="project__form"><a class="link" href="{{ $project->form }}" target="_blank">Анкета проекта</a></p>
                @endisset
                @can('update', $project)
                    <a class="link" href="{{ route('projects.edit', $project) }}">Редактировать</a>
                @endcan
            </div>
        </div>
    </div>
    <div class="section project">
        <div class="container project__container">
            <p>{{ $project->content }}</p>
        </div>
    </div>

    {{--<div class="section project">
        <div class="container project__container">
            <iframe
                src="{{ $project->form }}?embedded=true"
                width="100%" height="500" frameborder="0" marginheight="0" marginwidth="0">
                Загрузка анкеты...
            </iframe>
        </div>
    </div>--}}
@endsection
