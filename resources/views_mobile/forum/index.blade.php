@extends('layouts.app')

@section('title', 'Форум')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Форум</h1>
                <span><a class="link" href="{{ route('forum.sections.create') }}">Добавить раздел</a></span>
                @can('create', 'App\ForumTopic')
                    <span><a class="link" href="{{ route('forum.topics.create') }}">Добавить тему</a></span>
                @endcan
                @foreach ($sections as $section)
                    <div class="forum-section">
                        <h2 class="title forum-section__title">
                            {{ $section->title }}
                            <a class="link link--dark link--without-underline" href="{{ route('forum.sections.edit', $section) }}"><span class="icon icon--pencil"></span></a>
                        </h2>
                        @isset($section->description)
                            <div class="forum-section__description">{{ $section->description }}</div>
                        @endisset
                        @foreach ($section->topics as $topic)
                            <div class="forum-topic">
                                <h3 class="title forum-topic__title"><a class="link link--dark" href="{{ route('forum.topics.show', $topic) }}">{{ $topic->title }}</a></h3>
                                @isset($topic->description)
                                    <div class="forum-topic__description">{{ $topic->description }}</div>
                                @endisset
                                <div class="forum-topic__date">
                                    <span>Дата создания: {{ $topic->created_at->format('d.m.Y') }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                {{ $sections->links('layouts.pagination') }}

            </div>
        </div>
    </div>
@endsection
