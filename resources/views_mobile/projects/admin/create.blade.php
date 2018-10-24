@extends('dashboard.index')

@section('title', 'Добавление проекта')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
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
