<?php
    use App\Point;
?>
@extends('layouts.app')

@section('title', 'Редактирование точки на карте')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container-main-ckeditor">
                <h1 class="title title--xxl">Редактирование точки на карте</h1>
                @include('points.includes.form',
                    [
                        'submitButtonText' => 'Сохранить',
                        'actionPath' => route('points.update', $point)
                    ]
                )
                @cannot('administrate', $point)
                    @if(!is_null($point->moderated))
                        <div class="text">Изменение информации потребует повторной проверки проекта модератором.</div>
                    @endif
                @endcannot
                <div class="text"><a class="link" href="{{ route('points.show', $point) }}">&larr; Вернуться на страницу точки на карте</a></div>
            </div>
        </div>
    </div>
@endsection
