@extends('layouts.app')

@section('title', 'Добавление рубрики')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Добавление рубрики</h1>
                <form method="POST" action="{{ route('rubrics.store') }}">
                    @include('rubrics.includes.form', ['submitButtonText' => 'Добавить'])
                </form>
            </div>
        </div>
    </div>
@endsection
