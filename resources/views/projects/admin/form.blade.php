@can('administrate', $project)
    <form class="form" method="POST" action="{{ route('projects.admin.update', $project) }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label class="form-group__label" for="rubric">Рубрика</label>
            <select class="select {{ $errors->has('rubric_id') ? 'select_has-error' : '' }}" id="rubric" name="rubric_id">
                <option class="select__option" value="">Без рубрики</option>
                @foreach ($rubrics as $rubric)
                    <option class="select__option" value="{{ $rubric->id }}" {{ $rubric->id == $project->rubric_id ? 'selected' : ''}}>{{ $rubric->name }}</option>
                @endforeach
            </select>
            @if($errors->has('rubric_id'))
                <div class="form-group__message form-group__message--error">{{ $errors->first('rubric_id') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label class="form-group__label">Модерация</label>
            <div><input type="radio" name="moderated" id="moderated-1" value="1" {{ ($project->moderated == true) ? 'checked' : ''  }}><label for="moderated-1">Принят</label></div>
            <div><input type="radio" name="moderated" id="moderated-0" value="0" {{ ($project->moderated == false) ? 'checked' : ''  }}><label for="moderated-0">Отклонён</label></div>
            <div><input type="radio" name="moderated" id="moderated-null" value="" {{ ($project->moderated === null) ? 'checked' : ''  }}><label for="moderated-null">Рассматривается</label></div>
        </div>
        <div class="form-group">
            <label class="form-group__label">Отображается на главной</label>
            <div><input type="checkbox" name="published" id="published" {{ ($project->published_at) ? 'checked' : ''  }}><label for="published">Отображать на главной</label></div>
        </div>
        <div class="form-group">
            <button class="button button_success" type="submit">Сохранить</button>
        </div>
    </form>
@endcan
