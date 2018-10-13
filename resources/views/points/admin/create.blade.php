@extends('dashboard.index')

@section('title', 'Добавление точки на карту')

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

        var newPoint = new ymaps.GeoObject({
            geometry: {
                type: "Point",
                coordinates: [56.49, 84.98]
            },
            properties: {
                hintContent: "Новое событие",
                //balloonContentHeader: \"Огромная яма посреди дороги\",
                //balloonContentBody: \"<a href='/points/".$point->id."'><img class='imageMap'title='Огромная яма посреди дороги' src='/assets/images/v_razrabotke.jpg'></img></a>\",
                population: 11848762
            }
        },{
            preset: 'islands#redGlyphIcon',            
            iconGlyph: 'remove',
            iconGlyphColor: 'black',
                draggable: true
        });

        newPoint.events.add('drag', function () {
            $("#x_field").val(newPoint.geometry.getCoordinates()[0]);
            $("#y_field").val(newPoint.geometry.getCoordinates()[1]);
        });

        myMap.geoObjects.add(newPoint);
    }

    
    </script>
@endpush

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                @include('points.includes.form',
                    [
                        'submitButtonText' => 'Добавить',
                        'actionPath' => route('points.store')
                    ]
                )
            </div>
        </div>
    </div>
@endsection
