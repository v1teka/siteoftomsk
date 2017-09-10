@extends('layouts.app')

@section('title', 'Редактирование темы форума')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Редактирование темы форума</h1>
                <form method="POST" action="{{ route('forum.topics.update', $topic) }}">
                    {{ method_field('PATCH') }}
                    @include('forum.topics.form', ['submitButtonText' => 'Сохранить'])
                </form>
            </div>
        </div>
    </div>
@endsection
