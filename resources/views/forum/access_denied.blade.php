@extends('layouts.app')

@section('title', 'Доступ запрещен')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Доступ запрещен</h1>
                <p>Уважаемый посетитель!</p>
                <p>Для получения доступа к форуму необходимо связаться с модератором информационной системы.</p>

            </div>
        </div>
    </div>
@endsection
