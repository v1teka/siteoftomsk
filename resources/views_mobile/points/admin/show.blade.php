<?php
    use App\Point;
    if($point->isPositive){
        $color = "green";
        $icon_name = "ok";
    }else{
        $color = "red";
        $icon_name = "remove";
    }
?>
@extends('dashboard.index')

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

        <?php
            print "var thePoint = new ymaps.GeoObject({
                   geometry: {
                       type: \"Point\",
                       coordinates: [".$point->x.",".$point->y."]
                   },
                   properties: {
                       hintContent: \"".$point->title."\",
                       balloonContentHeader: \"".$point->title."\",
                       balloonContentBody: \"<img class='imageMap'title='".$point->title."' src='".$point->image."'></img>\",
                       population: 11848762
                   }
               },{
                    preset: 'islands#".$color."GlyphIcon',            
                    iconGlyph: '".$icon_name."',
                   iconGlyphColor: 'black'
               });
            myMap.geoObjects.add(thePoint);";   
        ?>
    }

    
    </script>
@endpush

@section('title', $point->title)

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <div class="form-group">
                    <label class="form-group__label">Название точки</label>
                    <div class="form-group__value"><a class="link" href="{{ route('points.show', $point) }}">{{ $point->title }}</a></div>
                </div>
                <div class="form-group">
                    <label class="form-group__label">Местоположение</label>
                    <div class="form-group__value">
                        <div id="tomskMap" style="width: 600px; height: 400px"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-group__label">Краткое описание ситуации</label>
                    <div class="form-group__value">{{ $point->description }}</div>
                </div>
                <div class="form-group">
                    <label class="form-group__label">Изображение</label>
                    <img class="form-group__image-preview" src="{{ Storage::disk('public')->url($point->image) }}" height="100"/>
                </div>
                <div class="form-group">
                    <label class="form-group__label">Дата создания</label>
                    <div class="form-group__value">{{ $point->created_at->format('d.m.Y H:i:s') }}</div>
                </div>
                <div class="form-group">
                    <label class="form-group__label">Дата изменения</label>
                    <div class="form-group__value">{{ $point->updated_at->format('d.m.Y H:i:s') }}</div>
                </div>
                <div class="form-group">
                    <label class="form-group__label">Автор</label>
                    <div class="form-group__value"><a class="link" href="{{ route('users.admin.show', $point->user) }}">{{ $point->user->full_name }}</a></div>
                </div>
                @include('points.admin.form')
                <div class="text"><a class="link" href="{{ route('points.show', $point) }}">&larr; Подробнее...</a></div>
            </div>
        </div>
    </div>
@endsection
