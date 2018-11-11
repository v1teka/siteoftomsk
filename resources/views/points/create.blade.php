@extends('layouts.app')

@section('title', 'Добавление точки на карту')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Добавление точки на карту</h1>
                @include('points.includes.form',
                    [
                        'submitButtonText' => 'Добавить',
                        'actionPath' => route('points.store'),
                        'mapType' => $mapType
                    ]
                )
            </div>
        </div>
    </div>
@endsection