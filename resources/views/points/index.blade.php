<?php use App\Point;?>
@extends('layouts.app')

@section('title', 'Карта позитива')

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
                           balloonContentBody: \"<a href='/points/".$point->id."'><img class='imageMap'title='Огромная яма посреди дороги' src='/assets/images/v_razrabotke.jpg'></img></a>\",
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
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Карта позитива</h1>
                <div id="positiveMap" style="width: 600px; height: 400px"></div>
            </div>
        </div>
    </div>
@endsection
