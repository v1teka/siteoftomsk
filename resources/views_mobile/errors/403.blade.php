@extends('layouts.app')

@section('title', 'Доступ запрещён')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Ошибка 403</h1>
                <h2 class="title title--xl">Доступ запрещён</h2>
                <a class="link" href="{{ route('pages.index') }}">Перейти на главную страницу</a>
            </div>
        </div>
    </div>
@endsection
