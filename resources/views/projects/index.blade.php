@extends('layouts.app')

@section('title', 'Проекты')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Проекты</h1>
                <div class="project-list">
                    @foreach ($projects->chunk(3) as $chunk)
                        <div class="row">
                            @foreach ($chunk as $project)
                                @include('projects.includes.card')
                            @endforeach
                        </div>
                    @endforeach
                </div>

                {{ $projects->links('layouts.pagination') }}

            </div>
        </div>
    </div>
@endsection
