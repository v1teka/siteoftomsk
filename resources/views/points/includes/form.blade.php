<?php
    Use App\PointType;
    Use App\Project;
?>
@push('scripts')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=ea23b980-9229-4bc0-8d71-4365a78f6ee5&lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
        function switchPointType(){
            $( "#pointTypeSelect > option" ).each(function( index ) {
                if($(this).attr('positive') == $("#isPositiveSelect").val())
                    $(this).show();
                else $(this).hide();
            });
            if( $( "#pointTypeSelect > option:selected").attr('positive') != $("#isPositiveSelect").val())
                $("#pointTypeSelect > option[positive='"+$("#isPositiveSelect").val()+"']").first().prop('selected',true);
            ($( "#pointTypeSelect > option:selected" ).attr('positive') == 1)? newPoint.options.set('preset', 'islands#greenGlyphIcon') : newPoint.options.set('preset', 'islands#redGlyphIcon');
            newPoint.options.set('iconGlyph', $( "#pointTypeSelect > option:selected" ).attr('icon'));
        }
        
        function updatePointPosition(){
            $("#x_field").val(newPoint.geometry.getCoordinates()[0]);
            $("#y_field").val(newPoint.geometry.getCoordinates()[1]);
        }

        ymaps.ready(initMap);
        var newPoint, myMap;

        function initMap(){ 
                myMap = new ymaps.Map("tomskMap", {
                center: [<?php (isset($point)) ? print($point->x.", ".$point->y) : print("56.49, 84.98"); ?>], // Координаты Томска
                zoom: 12
            });

            myMap.controls.remove('trafficControl');
            
            <?php
                if(isset($points))
                    print('addGroupPoints();');
            ?>

            newPoint = new ymaps.GeoObject({
                geometry: {
                    type: "Point",
                    coordinates: [<?php (isset($point)) ? print($point->x.", ".$point->y) : print("56.49, 84.98"); ?>]
                },
                properties: {
                    hintContent:  <?php (isset($point)) ? print("\"".$point->title."\"") : print("\"Новая точка\""); ?>,
                    population: 11848762
                }
            },{
                preset: <?php (isset($point) && $point->type->isPositive == 0) ? print("\"islands#redGlyphIcon\"") : print("\"islands#greenGlyphIcon\""); ?>,            
                iconGlyph: <?php (isset($point)) ? print("\"".$point->type->iconType."\"") : print("\"ok\""); ?>,
                iconGlyphColor: 'black',
                draggable: true
            });

            newPoint.events.add('drag', updatePointPosition);

            myMap.geoObjects.add(newPoint);
            switchPointType();
            updatePointPosition();
        }
    </script>
@endpush
<form method="POST" action="{{ $actionPath }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Название</label>
        <input class="form-control {{ $errors->has('title') ? 'input_has-error' : '' }}" type="text" name="title" id="title" placeholder="Название точки" value="{{ isset($point->title) ? $point->title : old('title') }}" />
        @if($errors->has('title'))
            <div class="form-group__message form-group__message--error">{{ $errors->first('title') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="isPositive">Карта</label>
        <select class="form-control {{ $errors->has('isPositive') ? 'select_has-error' : '' }}" id="isPositiveSelect" onChange="switchPointType()">
            <option class="select__option" value="1" {{ (((!isset($point)|| $point->type->isPositive == 1)) && (!isset($mapType) || $mapType == 1))  ? 'selected' : '' }}>Позитива</option>
            <option class="select__option" value="0" {{ ((isset($point) && $point->type->isPositive == 0) || (isset($mapType) && $mapType == 0)) ? 'selected' : '' }}>Проблем</option>
        </select>
    </div>
    <div class="form-group">
        <label for="type">Категория</label>
        <select class="form-control {{ $errors->has('point_type') ? 'select_has-error' : '' }}" id="pointTypeSelect" name="point_type" onChange="switchPointType()">
            @foreach (PointType::all() as $type)
                <option class="select__option" positive="{{ $type->isPositive }}" icon="{{ $type->iconType }}" value="{{ $type->id }}" {{ (isset($point) && ($point->type_id == $type->id)) ? 'selected' : '' }} >{{ $type->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="description">Местоположение</label>
        @if($errors->has('x') || $errors->has('y'))
            <div class="form-group__message form-group__message--error">Указана не корректная локация точки</div>
        @endif
        <div id="tomskMap" class="tomskMap"></div>
        <input type="hidden" name="x" id="x_field">
        <input type="hidden" name="y" id="y_field">
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control {{ $errors->has('description') ? 'textarea_has-error' : '' }}" name="description" id="description" placeholder="Краткое описание ситуации" rows="3">{{ isset($point->description) ? $point->description : old('description') }}</textarea>
        @if($errors->has('description'))
            <div class="form-group__message form-group__message--error">{{ $errors->first('description') }}</div>
        @endif
        <div class="help-block">Достаточно двух-трёх предложений.</div>
    </div>
    <div class="form-group">
        <label for="description">Относится к проекту</label>
        <select class="form-control {{ $errors->has('project_id') ? 'select_has-error' : '' }}" name="project_id">
            <option class="select__option" value="" {{ (!isset($point) || ($point->project_id == NULL)) ? 'selected' : '' }} >-</option>
            @foreach (Project::all() as $project)
                <option class="select__option" value="{{ $project->id }}" {{ (isset($point) && ($point->project_id == $project->id)) ? 'selected' : '' }} >{{ $project->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="image">Изображение</label>
        @if (isset($point) && isset($point->image))
            <div class="form-group__value">
                <img class="form-group__image-preview" src="{{ Storage::disk('public')->url($point->image) }}" height="100"/>
            </div>
        @endif
        <input class="file" type="file" name="image" id="image" accept="image/png,image/jpeg">
        @if($errors->has('image'))
            <div class="form-group__message form-group__message--error">{{ $errors->first('image') }}</div>
        @endif
        <div class="help-block">Поддерживаются файлы .jpeg, .jpg и .png размером не более 30&nbsp;Мб.</div>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit" style="float: left;">{{ $submitButtonText }}</button>
    </div>
</form>
@if (isset($point) && !isset($points))
    <!--<form method="POST" action="{{ route('points.destroy', $point) }}" enctype="multipart/form-data" style="float: left;">-->
    <form id="point_delete_form" action="{{ route('points.destroy', $point) }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <button class="btn btn-danger" type="submit" id="point_delete_btn">Удалить точку с карты</button>
        </div>
    </form>
    <div style="clear: both;"></div>
@endif

@push('scripts')
<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
<!--<script type="text/javascript" src="{{ asset('/js/pointDelete.js') }}"></script>-->
<script>
    window.onload = function() {
        CKEDITOR.replace('content', {
            //customConfig: '{{ asset("/assets/ckeditor/config/point.js") }}' // Не могу понять причину, почему не подключаются модули (например, загрузки изображений) в случае, если используется этот конфиг, даже с аналогичными настройками внутри
        });
        $('#point_delete_form').submit(function(e) {
            var currentForm = this;
            e.preventDefault();
            bootbox.confirm({
                message: "Вы действительно хотите удалить точку с карты?",
                buttons: {
                    confirm: {
                        label: 'Да, удалить',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'Нет',
                        className: 'btn-success'
                    }
                },
                callback: function (result) {
                    if (result) {
                        currentForm.submit();
                    }
                }
            })
        });
    }
</script>
@endpush
