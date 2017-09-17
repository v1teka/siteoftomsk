@extends('layouts.app')

@section('title', 'Smart-решения для города')
@section('description', '')

@section('content')
    <div class="page__content">
        <div class="container">
            <h1 class="project-header__title title title--xxl">Smart-решения для города</h1>
            @foreach($smartSections as $smartSection)
                @include('smart.section.includes.card')
            @endforeach
        </div>
    </div>
@endsection