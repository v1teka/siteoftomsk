@extends('layouts.app')

@section('title', 'Добавление темы форума')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Добавление темы форума</h1>
                <form method="POST" action="{{ route('forum.topics.store') }}">
                    @include('forum.topics.form', ['submitButtonText' => 'Добавить'])
                </form>
            </div>
        </div>
    </div>
@endsection
