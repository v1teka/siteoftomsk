<?php
    use App\Point;
    use App\PointType;
    if($mapType==1){
        $mapTitle = "Карта позитива";
        $color = "green";
    }else{
        $mapTitle = "Карта проблем";
        $color = "red";
    }
    
    
?>
@extends('layouts.app')

@section('title', $mapTitle)

@push('scripts')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=ea23b980-9229-4bc0-8d71-4365a78f6ee5&lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
    // Функция ymaps.ready() будет вызвана, когда
    // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
    ymaps.ready(initMap);


    function initMap(){ 
        var myMap = new ymaps.Map("tomskMap", {
            center: [56.49, 84.98], // Координаты Томска
            zoom: 12
        });
        myMap.controls.remove('trafficControl');
        var geoObjects = [];
        var clusterer = new ymaps.Clusterer({
            /**
             * Через кластеризатор можно указать только стили кластеров,
             * стили для меток нужно назначать каждой метке отдельно.
             * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/option.presetStorage.xml
             */
            preset: 'islands#invertedVioletClusterIcons',
            /**
             * Ставим true, если хотим кластеризовать только точки с одинаковыми координатами.
             */
            groupByCoordinates: false,
            /**
             * Опции кластеров указываем в кластеризаторе с префиксом "cluster".
             * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/ClusterPlacemark.xml
             */
            clusterDisableClickZoom: true,
            clusterHideIconOnBalloonOpen: false,
            geoObjectHideIconOnBalloonOpen: false
        });

        <?php
            $pcount=0;
            $ncount=0;
            $name="";
            
            $points = Point::moderated()->whereHas('type', function($q) use ($mapType)
            {
                $q->where('isPositive', $mapType);
            })->get();
            //$points = Point::moderated()->where('isPositive', $mapType)->get();
            foreach ($points as $point){
                if ($point->type->isPositive){
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
                           hintContent: \"".$point->title."\",
                           balloonContentHeader: \"".$point->title."\",
                           balloonContentBody: \"<a href='/points/".$point->id."'><img class='imageMap'title='".$point->title."' src='/assets/images/v_razrabotke.jpg'></img></a>\",
                           population: 11848762
                       }
                   },{
                       preset: 'islands#".$color."GlyphIcon',            
                       iconGlyph: '".$point->type->iconType."',
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
                <h1 class="title title--xxl">{{ $mapTitle }}</h1>
                <div id="tomskMap" class="tomskMap"></div>
                <a class="link" href="{{route('points.create', $mapType)}}">Добавить точку на карту</a>
            </div>
        </div>
    </div>
@endsection
