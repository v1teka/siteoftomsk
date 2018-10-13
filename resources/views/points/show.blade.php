<?php use App\Point;?>
@extends('layouts.app')

@section('title', $project->title)
@section('description', $project->description)

@push('scripts')
    <script type="text/javascript" src="{{ asset('/js/Project.js') }}" type="text/javascript"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=ea23b980-9229-4bc0-8d71-4365a78f6ee5&lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
    // Функция ymaps.ready() будет вызвана, когда
    // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
    ymaps.ready(initMap);


    function initMap(){ 
        var myMap = new ymaps.Map("positiveMap", {
            center: [56.49, 84.98], // Координаты Томска
            zoom: 12
        });

        <?php
            $pcount=0;
            $ncount=0;
            $name="";
            $points = Point::all();
            foreach ($points as $point){
                if ($point->isPositive){
                    $name="positive".$pcount;
                    $pcount++;
                }
                else{
                    $name="negative".$ncount;
                    $ncount++;
                }
                print "var ".$name." = new ymaps.GeoObject({
                       geometry: {
                           type: \"Point\",
                           coordinates: [".$point->x.",".$point->y."]
                       },
                       properties: {
                           hintContent: \"Негативное событие\",
                           balloonContentHeader: \"Огромная яма посреди дороги\",
                           balloonContentBody: \"<a href=\"http://siteoftomsk.ru/trouble001\"><img class=\"imageMap\" title=\"Огромная яма посреди дороги\" src=\"/assets/images/v_razrabotke.jpg\"></img></a>\",
                           population: 11848762
                       }
                   },{
                       preset: 'islands#redGlyphIcon',            
                       iconGlyph: 'remove',
                       iconGlyphColor: 'black'
                   });
                myMap.geoObjects.add(".$name.");";
            }
        ?>
    }

    
    </script>
@endpush

@section('content')
    @parent
    <div class="project">
        <header class="project-header" style="background: #222 url('{{ Storage::disk('public')->url($project->image) }}') no-repeat center center; background-size: cover;">
            <div class="container">
                <h1 class="project-header__title title title--xxl">{{ $project->title }}</h1>
                <!--<p class="project-header__description">{{ $project->description }}</p>-->
                @isset($project->rubric)
                    <p><a class="rubric-label rubric-label--light" href="{{ route('rubrics.show', $project->rubric) }}">{{ $project->rubric->name }}</a></p>
                @endisset
                @can('update', $project)
                    <a class="link link--light" href="{{ route('projects.edit', $project) }}">Редактировать</a>
                @endcan
                @can('administrate', $project)
                    <a class="link link--light" href="{{ route('projects.admin.show', $project) }}">Администрировать</a>
                @endcan
            </div>
        </header>

        <article class="project-content">
            <div class="container-main">
                <div class="text">
                    {!! $project->content !!}
                    <div id="positiveMap" style="width: 600px; height: 400px"></div>
                </div>

                @if ($project->files->count() > 0)
                    <h2 class="title title-files--xl">Информация для скачивания</h2>
                    @foreach ($project->files as $file)
                        <p><a class="link file-link file-link--{{$file->extension}}" href="{{ Storage::disk('public')->url($file->path) }}" target="_blank">{{ $file->name }}</a></p>
                    @endforeach
                @endif

                @isset($project->form)
                    <div class="project-form js-spoiler">
                        <h2 class="title title--questionnaire">
                            <a class="link link--dark js-spoiler-link" href="{{ $project->form }}" target="_blank">
                                <img src="{{ asset('/assets/images/anketa.png') }}">
                                Пройти анкетирование
                            </a>
                        </h2>
                        <div class="project-form__content js-spoiler-content">
                            <iframe
                                src="{{ $project->form }}?embedded=true"
                                width="100%" height="1000" frameborder="0" marginheight="0" marginwidth="0">
                                Загрузка... <a class="link" href="{{ $project->form }}" target="_blank">Открыть в новом окне</a>
                            </iframe>
                        </div>
                    </div>
                @endisset
            </div>
        </article>
        <footer class="project-footer">
            <div class="container-main">
                <div class="project-rating">
                    <div class="rating js-rating" data-rateable="{{ $project->id }}" data-avg-rating="{{ $project->avg_rating }}" data-user-rating="{{ Auth::check() ? Auth::user()->rating($project) : null }}">
                        <span class="rating__stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="rating__star icon icon--star-empty js-rating-star" data-score="{{ $i }}"></span>
                            @endfor
                        </span>
                        <span class="rating__avg-value">
                            <span class="js-avg-rating">{{ $project->avg_rating > 0 ? $project->avg_rating : 'Нет оценок' }}</span>
                        </span>
                        @if (Auth::check())
                            <div class="rating__user-value">
                                <span class="js-user-rating">{{ Auth::user()->rating($project) != null ? 'Ваша оценка: ' . Auth::user()->rating($project) : ''  }}</span>
                            </div>
                        @else
                            <div class="rating__user-value">
                                <a class="link link--dark" href="{{ route('login') }}">Войдите</a>, чтобы оценить.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="project-social">
                    <div class="project-social__buttons likely">
                        @push('head')
                            <link rel="stylesheet" href="{{ asset('/assets/likely/likely.css') }}">
                        @endpush
                        <div class="vkontakte">Рассказать</div>
                        <div class="odnoklassniki">Класс</div>
                        <div class="facebook">Поделиться</div>
                        <div class="telegram">Отправить</div>
                        <div class="twitter">Твитнуть</div>
                        @push('scripts')
                            <script src="{{ asset('/assets/likely/likely.js') }}" type="text/javascript"></script>
                        @endpush
                    </div>
                </div>
                <div class="project-meta">
                    <span class="project-meta__author">{{ $project->user->full_name }}</span>
                    <span class="article-footer__date">{{ $project->created_at->format('d.m.Y') }}</span>
                </div>
            </div>
        </footer>
        <div class="container-main">
            @foreach($comments as $comment)
                @include ('projects.includes.comment', $comment)
            @endforeach
        </div>
        @include ('projects.includes.comment_form')
        <div class="comment-footer"></div>
    </div>
@endsection
