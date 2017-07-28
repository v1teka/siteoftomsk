@extends('layouts.app')

@section('title', $project->title)
@section('description', $project->description)

@section('content')
    @parent
    <div class="page">
        <div class="page__slider project-header" style="background:url('{{ Storage::disk('public')->url($project->image) }}') no-repeat center center; background-size: cover;">
            <div class="container">
                <h1 class="title title--xxl project-header__title">{{ $project->title }}</h1>
                <p class="project-header__description">{{ $project->description }}</p>
                @isset($project->rubric)
                    <p><a class="rubric-label rubric-label--light" href="{{ route('rubrics.show', $project->rubric) }}">{{ $project->rubric->name }}</a></p>
                @endisset
                @can('update', $project)
                    <a class="link link--light" href="{{ route('projects.edit', $project) }}">Редактировать</a>
                @endcan
                @can('administrate', $project)
                    <a class="link link--light" href="{{ route('projects.admin.show', $project) }}">Администрировать</a>
                @endcan
            </div>
        </div>

        <div class="page__content project-content">
            <div class="container">
                {!! $project->content !!}
                @isset($project->form)
                    <div class="project-form">
                        <h2 class="title title--xl js-spoiler-link"><a class="link link--dark link--dashed" href="{{ $project->form }}" target="_blank">Анкета</a></h2>
                        <div class="project-form__content js-spoiler-content">
                            <iframe
                                src="{{ $project->form }}?embedded=true"
                                width="100%" height="1000" frameborder="0" marginheight="0" marginwidth="0">
                                Загрузка... <a class="link" href="{{ $project->form }}" target="_blank">Открыть в новом окне</a>
                            </iframe>
                        </div>
                    </div>
                @endisset
                <p class="project-content__author">{{ $project->user->full_name }}, {{ $project->created_at->format('d.m.Y') }}</p>
            </div>
        </div>
    </div>
@endsection
