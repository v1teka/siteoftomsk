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
        <select class="form-control {{ $errors->has('isPositive') ? 'select_has-error' : '' }}" id="point_type" name="isPositive">
            <option class="select__option" value="1" {{ (isset($point) && $point->isPositive == 1) ? 'selected' : '' }}>Положительное</option>
            <option class="select__option" value="0" {{ (isset($point) && $point->isPositive == 0) ? 'selected' : '' }}>Отрицательное</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Местоположение</label>
        @if($errors->has('x') || $errors->has('y'))
            <div class="form-group__message form-group__message--error">Указана не корректная локация точки</div>
        @endif
        <div id="positiveMap" style="width: 600px; height: 400px"></div>
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
        <div class="help-block">Поддерживаются файлы .jpeg, .jpg и .png шириной от 1000 пикс. и размером не более 30&nbsp;Мб.</div>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit" style="float: left;">{{ $submitButtonText }}</button>
    </div>
</form>
@if (isset($point))
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
