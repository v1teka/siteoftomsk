@extends('layouts.app')

@section('title', 'Проекты')

@section('content')
    @parent
    <div class="section projects">
        <div class="container projects__container">
            <h2 class="title title-xl projects__title">Проекты</h2>
            @foreach ($projects->chunk(3) as $chunk)
                <div class="row">
                    @foreach ($chunk as $project)
                        @include('projects.includes.card')
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    {{ $projects->links('layouts.pagination') }}

@endsection
