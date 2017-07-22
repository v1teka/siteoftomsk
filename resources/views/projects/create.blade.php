@extends('layouts.app')

@section('title', 'Добавление проекта')

@section('content')
    @parent
    <div class="section">
        <div class="container">
            <h1 class="title title-xxl">Добавление проекта</h1>
            <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                @include('projects.includes.form', ['submitButtonText' => 'Добавить'])
            </form>
        </div>
    </div>
@endsection
