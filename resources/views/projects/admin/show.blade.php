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

            @can('administrate', $project)
                <form class="form" method="POST" action="{{ route('projects.admin.update', $project) }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="form-group__label">Модерация</label>
                        <div><input type="radio" name="moderated" id="moderated-1" value="1" {{ ($project->moderated == true) ? 'checked' : ''  }}><label for="moderated-1">Принят</label></div>
                        <div><input type="radio" name="moderated" id="moderated-0" value="0" {{ ($project->moderated == false) ? 'checked' : ''  }}><label for="moderated-0">Отклонён</label></div>
                        <div><input type="radio" name="moderated" id="moderated-null" value="" {{ ($project->moderated === null) ? 'checked' : ''  }}><label for="moderated-null">Рассматривается</label></div>
                    </div>
                    <div class="form-group">
                        <label class="form-group__label">Отображается на главной</label>
                        <div><input type="checkbox" name="published" id="published" {{ ($project->published_at) ? 'checked' : ''  }}><label for="published">Отображать на главной</label></div>
                    </div>
                    <div class="form-group">
                        <button class="button button_success" type="submit">Сохранить</button>
                    </div>
                </form>
            @endcan
        </div>
    </div>
@endsection
