@extends('dashboard.index')

@section('title', 'Рубрики')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                @foreach ($rubrics as $rubric)
                    <div class="rubric-line">
                        <h2 class="rubric-line__title title title--xl"><a class="link link--dark" href="{{ route('rubrics.show', $rubric) }}" title="{{ $rubric->name }}">{{ $rubric->name }}</a></h2>
                        <div class="row">
                            @foreach ($rubric->projects->take(3) as $project)
                                @include('projects.includes.card')
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $rubrics->links('layouts.pagination') }}
    </div>
@endsection
