@extends('layouts.app')

@section('title', 'Добавление раздела форума')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Добавление раздела форума</h1>
                <form method="POST" action="{{ route('forum.sections.store') }}">
                    @include('forum.sections.form', ['submitButtonText' => 'Добавить'])
                </form>
            </div>
        </div>
    </div>
@endsection
