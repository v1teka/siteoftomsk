@extends('layouts.app')

@section('title', $rubric->name)
@section('description', $rubric->description)

@section('content')
    @parent
    <div class="section rubric">
        <div class="container rubric__container">
            <h1 class="title title-xxl rubric__title">{{ $rubric->name }}</h1>
            @isset($rubric->description)
                <div class="rubric__description">{{ $rubric->description }}</div>
            @endisset
            @can('update', $rubric)
                <a class="link" href="{{ route('rubrics.edit', $rubric) }}">Редактировать</a>
            @endcan
        </div>
    </div>

    <div class="section rubric">
        <div class="container rubric__container">
            @if(count($projects))
                <h2 class="title title-xl">Проекты</h2>
                @foreach ($projects->chunk(3) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $project)
                            @include('projects.includes.card')
                        @endforeach
                    </div>
                @endforeach
            @else
                <div class="rubric__message rubric__message-no-projects">Нет проектов</div>
            @endif
        </div>
    </div>
@endsection
