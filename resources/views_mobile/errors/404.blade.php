@extends('layouts.app')

@section('title', 'Страница не найдена')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Ошибка 404</h1>
                <h2 class="title title--xl">Страница не найдена</h2>
                <a class="link" href="{{ route('pages.index') }}">Перейти на главную страницу</a>
            </div>
        </div>
    </div>
@endsection
