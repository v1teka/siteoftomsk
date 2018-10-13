<?php use App\Point;?>
@extends('layouts.app')

@section('title', $point->title)
@section('description', $point->description)

@push('scripts')
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
                       balloonContentBody: \"<a href='/points/".$point->id."'><img class='imageMap'title='Огромная яма посреди дороги' src='/assets/images/v_razrabotke.jpg'></img></a>\",
                       population: 11848762
                   }
               },{
                   preset: 'islands#redGlyphIcon',            
                   iconGlyph: 'remove',
                   iconGlyphColor: 'black'
               });
            myMap.geoObjects.add(".$name.");";   
        ?>
    }

    
    </script>
@endpush

@section('content')
    @parent
    <div class="point">
        <header class="point-header" style="background: #222 url('{{ Storage::disk('public')->url($point->image) }}') no-repeat center center; background-size: cover;">
            <div class="container">
                <h1 class="point-header__title title title--xxl">{{ $point->title }}</h1>
                <!--<p class="point-header__description">{{ $point->description }}</p>-->
                @isset($point->rubric)
                    <p><a class="rubric-label rubric-label--light" href="{{ route('rubrics.show', $point->rubric) }}">{{ $point->rubric->name }}</a></p>
                @endisset
                @can('update', $point)
                    <a class="link link--light" href="{{ route('points.edit', $point) }}">Редактировать</a>
                @endcan
                @can('administrate', $point)
                    <a class="link link--light" href="{{ route('points.admin.show', $point) }}">Администрировать</a>
                @endcan
            </div>
        </header>

        <article class="point-content">
            <div class="container-main">
                <div id="positiveMap" style="width: 600px; height: 400px"></div>
            </div>
        </article>
        <footer class="point-footer">
            <div class="container-main">
                <div class="point-rating">
                    <div class="rating js-rating" data-rateable="{{ $point->id }}" data-avg-rating="{{ $point->avg_rating }}" data-user-rating="{{ Auth::check() ? Auth::user()->rating($point) : null }}">
                        <span class="rating__stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="rating__star icon icon--star-empty js-rating-star" data-score="{{ $i }}"></span>
                            @endfor
                        </span>
                        <span class="rating__avg-value">
                            <span class="js-avg-rating">{{ $point->avg_rating > 0 ? $point->avg_rating : 'Нет оценок' }}</span>
                        </span>
                        @if (Auth::check())
                            <div class="rating__user-value">
                                <span class="js-user-rating">{{ Auth::user()->rating($point) != null ? 'Ваша оценка: ' . Auth::user()->rating($point) : ''  }}</span>
                            </div>
                        @else
                            <div class="rating__user-value">
                                <a class="link link--dark" href="{{ route('login') }}">Войдите</a>, чтобы оценить.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="point-social">
                    <div class="point-social__buttons likely">
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
                <div class="point-meta">
                    <span class="point-meta__author">{{ $point->user->full_name }}</span>
                    <span class="article-footer__date">{{ $point->created_at->format('d.m.Y') }}</span>
                </div>
            </div>
        </footer>
        <div class="container-main">
            @foreach($comments as $comment)
                @include ('points.includes.comment', $comment)
            @endforeach
        </div>
        @include ('points.includes.comment_form')
        <div class="comment-footer"></div>
    </div>
@endsection
