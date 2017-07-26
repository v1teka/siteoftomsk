@extends('layouts.app')

@section('title', $rubric->name)
@section('description', $rubric->description)

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">{{ $rubric->name }}</h1>
                @isset($rubric->description)
                    <p class="rubric-description">{{ $rubric->description }}</p>
                @endisset
                @can('update', $rubric)
                    <a class="link" href="{{ route('rubrics.edit', $rubric) }}">Редактировать</a>
                @endcan
                <div class="rubric-projects">
                    @if (count($projects))
                        <h2 class="title title--xl">Проекты</h2>
                        @foreach ($projects->chunk(3) as $chunk)
                            <div class="row">
                                @foreach ($chunk as $project)
                                    @include('projects.includes.card')
                                @endforeach
                            </div>
                        @endforeach
                    @else
                        <div class="rubric-projects__message">Нет проектов</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
