@extends('dashboard.index')

@section('title', 'Добавление проекта')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                    @include('projects.includes.form', ['submitButtonText' => 'Добавить'])
                </form>
            </div>
        </div>
    </div>
@endsection
