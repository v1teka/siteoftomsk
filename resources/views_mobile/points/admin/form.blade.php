@can('administrate', $point)
    <form class="form" method="POST" action="{{ route('points.admin.update', $point) }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label class="form-group__label">Модерация</label>
            <div><input type="radio" name="moderated" id="moderated-1" value="1" {{ ($point->moderated == true) ? 'checked' : ''  }}><label for="moderated-1">Принять</label></div>
            <div><input type="radio" name="moderated" id="moderated-0" value="0" {{ ($point->moderated == false) ? 'checked' : ''  }}><label for="moderated-0">Отклонить</label></div>
            <div><input type="radio" name="moderated" id="moderated-null" value="" {{ ($point->moderated === null) ? 'checked' : ''  }}><label for="moderated-null">На рассмотрении</label></div>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Сохранить</button>
        </div>
    </form>
@endcan
