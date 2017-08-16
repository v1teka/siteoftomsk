@extends('dashboard.index')

@section('title', $project->title)

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <div class="form-group">
                    <label class="form-group__label">Название проекта</label>
                    <div class="form-group__value"><a class="link" href="{{ route('projects.show', $project) }}">{{ $project->title }}</a></div>
                </div>
                <div class="form-group">
                    <label class="form-group__label">Краткое описание проекта</label>
                    <div class="form-group__value">{{ $project->description }}</div>
                </div>
                <div class="form-group">
                    <label class="form-group__label">Контент</label>
                    <div class="form-group__value">
                        <div class="js-spoiler">
                            <!--<a class="link link--dashed js-spoiler-link" href="#">Показать</a>-->
                            <div class="project-content text js-spoiler-content">
                                {!! $project->content !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-group__label">Изображение</label>
                    <img class="form-group__image-preview" src="{{ Storage::disk('public')->url($project->image) }}" height="100"/>
                </div>
                @if ($project->files->count() > 0)
                    <div class="form-group">
                        <label class="form-group__label">Файлы</label>
                        <div class="form-group__value">
                            @foreach ($project->files as $file)
                                <p><a class="link file-link file-link--{{$file->extension}}" href="{{ Storage::disk('public')->url($file->path) }}" target="_blank">{{ $file->name }}</a></p>
                            @endforeach
                        </div>
                    </div>
                @endif
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
                @isset ($project->form)
                    <div class="form-group">
                        <label class="form-group__label">Анкета</label>
                        <div class="form-group__value"><a class="link" href="{{ $project->form }}" target="_blank">{{ $project->form }}</a></div>
                    </div>
                @endisset
                @include('projects.admin.form')
                <div class="text"><a class="link" href="{{ route('projects.show', $project) }}">&larr; Открыть страницу проекта</a></div>
            </div>
        </div>
    </div>
@endsection
