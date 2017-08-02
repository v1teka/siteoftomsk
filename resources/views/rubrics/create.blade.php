@extends('dashboard.index')

@section('title', 'Добавление рубрики')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <form method="POST" action="{{ route('rubrics.store') }}">
                    @include('rubrics.includes.form', ['submitButtonText' => 'Добавить'])
                </form>
            </div>
        </div>
    </div>
@endsection
