@extends('layouts.app')

@section('title', $topic->title)

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--m">
                    {{ $topic->title }}
                    @can('update', $topic)
                        <a class="link link--dark link--without-underline" href="{{ route('forum.topics.edit', $topic) }}"><span class="icon icon--pencil"></span></a>
                    @endcan
                </h1>
                <p>{{ $topic->description }}</p>

                <div class="breadcrumb">
                    <span class="breadcrumb__item"><a class="link link--dark" href="{{ route('forum.index') }}">Форум</a></span>
                    <span class="breadcrumb__item">{{ $topic->section->title }}</span>
                    <span class="breadcrumb__item breadcrumb__item--current">{{ $topic->title }}</span>
                </div>
                @foreach ($messages as $message)
                    <div class="row forum-message forum-message--border">
                        <div class="row__col row__col--size-2 forum-message__info">
                            <div class="forum-message__author">{{ $message->user->name }}</div>
                            <div class="forum-message__date">{{ $message->created_at->format('d.m.Y H:i') }}</div>
                            @can('delete', $message)
                                @include('forum.messages.delete')
                            @endcan
                        </div>
                        <div class="row__col row__col--size-10 forum-message__content">
                            {{ $message->text }}
                        </div>
                    </div>
                @endforeach

                <div class="forum-message">
                    @can('send', 'App\ForumMessage')
                        @include('forum.messages.create')
                    @else
                        <p class="forum-message__login">Чтобы оставить сообщение необходимо <a class="link link--dark" href={{ route('login') }}>войти</a> или <a class="link link--dark" href={{ route('register') }}>зарегистрироваться</a>.</p>
                    @endcan
                </div>

                {{ $messages->links('layouts.pagination') }}

            </div>
        </div>
    </div>
@endsection
