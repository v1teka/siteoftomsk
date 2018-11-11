<?php
    Use App\Point;
    if(Point::find($group->pointIDs[0])->type->isPositive){
        $color = "green";
    }else{
        $color = "red";
    }
?>
@extends('dashboard.index')

@section('title', 'Скопление точек')

@push('scripts')
    <script type="text/javascript">
        function addGroupPoints(){
        
            <?php
                $points = Point::whereIn('id', $group->pointIDs)->get();
                $i=0;
            ?>
            @foreach($points as $point)
                var {{"point".$i}} = new ymaps.GeoObject({
                    geometry: {
                        type: "Point",
                        coordinates: [{{$point->x }}, {{$point->y}}]
                    },
                    properties: {
                        hintContent: "{{ $point->title }}",
                        balloonContentHeader: "{{ $point->title }}",
                        balloonContentBody: "<a href='{{ route('points.admin.show', $point) }}'><img class='imageMap' title='{{$point->title}}' src='{{ Storage::disk('public')->url($point->image) }}'></img></a>",
                        population: 11848762
                    }
                },{
                    preset: 'islands#{{ $color }}GlyphCircleIcon',            
                    iconGlyph: "{{ $point->type->iconType }}",
                    iconGlyphColor: 'black'
                });
                myMap.geoObjects.add({{"point".$i++}});
            @endforeach
        }
    </script>
@endpush

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <?php
                    $point = $points->first();
                    $point->title = "";    
                ?>
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
