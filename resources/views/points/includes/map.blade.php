@push('scripts')
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
                       balloonContentBody: \"<a href='/points/".$point->id."'><img class='imageMap'title='".$point->title."' src='".$point->image."'></img></a>\",
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

<div id="tomskMap" class="tomskMap"></div>