@extends('layouts.app')

@section('title', 'Добавление проекта')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Добавление проекта</h1>
                @include('projects.includes.form',
                    [
                        'submitButtonText' => 'Добавить',
                        'actionPath' => route('projects.store')
                    ]
                )
            </div>
        </div>
    </div>
@endsection