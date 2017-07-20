@extends('layouts.app')

@section('title', 'Рубрики')

@section('content')
    @parent
    <div class="section">
        <div class="container">
            <h1 class="title title-xxl">Рубрики</h1>
            @foreach ($rubrics as $rubric)
                <h2 class="title title-xl"><a class="link" href="{{ route('rubrics.show', $rubric) }}" title="Перейти к рубрике">{{ $rubric->name }}</a></h2>
                <div class="row">
                    @foreach ($rubric->projects->take(3) as $project)
                        @include('projects.includes.card')
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    {{ $rubrics->links('layouts.pagination') }}
@endsection
