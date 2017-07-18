@extends('layouts.app')

@section('title', $project->title)
@section('description', $project->description)

@section('content')
    @parent
    <div class="section project">
        <div class="project__header" style="background-color: #222;">
            <div class="container project__container">
                <h1 class="title project__title">{{ $project->title }}</h1>
                <p class="project__description">{{ $project->description }}</p>
                @can('update', $project)
                    <a class="link" href="{{ route('projects.edit', $project->id) }}">Редактировать</a>
                @endcan
            </div>
        </div>
    </div>
    <div class="section project">
        <div class="container project__container">
            <p>{{ $project->content }}</p>
        </div>
    </div>
@endsection
