@extends('layouts.app')

@section('title', 'Smart-решения для города')
@section('description', '')

@section('content')
    <div class="page__content">
        <div class="container">
            <h1 class="project-header__title title title--xxl">Smart-решения для города</h1>
            <?php $chunk_num = 0; ?>
            @foreach($smartSections as $smartSection)
                @if ($chunk_num == 3)
                    <div class="clear-both"></div>
                @endif
                @include('smart.section.includes.card')
                <?php $chunk_num++; if ($chunk_num > 3) {$chunk_num = 0;}; ?>
            @endforeach
        </div>
    </div>
@endsection