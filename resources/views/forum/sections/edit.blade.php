@extends('layouts.app')

@section('title', 'Редактирование раздела форума')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Редактирование раздела форума</h1>
                <form method="POST" action="{{ route('forum.sections.update', $section) }}">
                    {{ method_field('PATCH') }}
                    @include('forum.sections.form', ['submitButtonText' => 'Сохранить'])
                </form>
            </div>
        </div>
    </div>
@endsection
