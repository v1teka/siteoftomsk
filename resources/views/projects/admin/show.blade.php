@extends('layouts.app')

@section('title', $project->title)

@section('content')
    @parent
    <div class="section">
        <div class="container">
            <h1 class="title title-xxl">{{ $project->title }}</h1>
            <div class="form-group">
                <label class="form-group__label">Название проекта</label>
                <div class="form-group__value">{{ $project->title }}</div>
            </div>
            <div class="form-group">
                <label class="form-group__label">Краткое описание проекта</label>
                <div class="form-group__value">{{ $project->description }}</div>
            </div>
            <div class="form-group">
                <label class="form-group__label">Контент</label>
                <div class="form-group__value">{{ $project->content }}</div>
            </div>
            <div class="form-group">
                <label class="form-group__label">Изображение</label>
                <img class="form-group__image-preview" src="{{ Storage::disk('public')->url($project->image) }}" height="100"/>
            </div>
            <div class="form-group">
                <label class="form-group__label">Дата создания</label>
                <div class="form-group__value">{{ $project->created_at->format('d.m.Y H:i:s') }}</div>
            </div>
            <div class="form-group">
                <label class="form-group__label">Дата изменения</label>
                <div class="form-group__value">{{ $project->updated_at->format('d.m.Y H:i:s') }}</div>
            </div>
            <div class="form-group">
                <label class="form-group__label">Автор</label>
                <div class="form-group__value"><a class="link" href="{{ route('users.admin.show', $project->user) }}">{{ $project->user->full_name }}</a></div>
            </div>
            @isset ($project->rubric)
                <div class="form-group">
                    <label class="form-group__label">Рубрика</label>
                    <div class="form-group__value"><a class="link" href="{{ route('rubrics.show', $project->rubric ) }}">{{ $project->rubric->name }}</a></div>
                </div>
            @endisset
            @isset ($project->form)
                <div class="form-group">
                    <label class="form-group__label">Анкета</label>
                    <div class="form-group__value"><a class="link" href="{{ $project->form }}" target="_blank">{{ $project->form }}</a></div>
                </div>
            @endisset

            @include('projects.admin.form')
            
        </div>
    </div>
@endsection
