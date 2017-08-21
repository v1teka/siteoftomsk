@extends('layouts.app')

@section('title', 'Проекты')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Проекты</h1>
                <!--<div class="project-list">-->
                <div class="GrossGroup">
                    @foreach ($projects as $project)
                        @include('projects.includes.card')
                    @endforeach
                </div>
                <!--</div>-->

                {{ $projects->links('layouts.pagination') }}

            </div>
        </div>
    </div>
@endsection
