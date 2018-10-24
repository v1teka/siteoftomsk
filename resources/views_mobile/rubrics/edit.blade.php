@extends('layouts.app')

@section('title', 'Редактирование рубрики')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Редактирование рубрики</h1>
                <form method="POST" action="{{ route('rubrics.update', $rubric) }}">
                    {{ method_field('PATCH') }}
                    @include('rubrics.includes.form', ['submitButtonText' => 'Сохранить'])
                </form>
                @include('rubrics.includes.deleting_form')
                <div class="text"><a class="link" href="{{ route('rubrics.show', $rubric) }}">&larr; Вернуться на страницу рубрики</a></div>
            </div>
        </div>
    </div>
@endsection
