{{ csrf_field() }}
<div class="form-group">
    <label class="form-group__label" for="title">Название</label>
    <input class="input {{ $errors->has('title') ? 'input_has-error' : '' }}" type="text" name="title" id="title" placeholder="Название проекта" value="{{ $project->title or old('title') }}" />
    @if($errors->has('title'))
        <div class="form-group__message_error">{{ $errors->first('title') }}</div>
    @endif
</div>
<div class="form-group">
    <label class="form-group__label" for="description">Описание</label>
    <textarea class="textarea {{ $errors->has('description') ? 'textarea_has-error' : '' }}" name="description" id="description" placeholder="Краткое описание проекта" rows="3">{{ $project->description or old('description') }}</textarea>
    @if($errors->has('description'))
        <div class="form-group__message_error">{{ $errors->first('description') }}</div>
    @endif
    <div class="form-group__help">Отображается в карточке проекта. Максимум 255 символов.</div>
</div>
<div class="form-group">
    <label class="form-group__label" for="content">Контент</label>
     <textarea class="textarea {{ $errors->has('content') ? 'textarea_has-error' : '' }}" name="content" id="content" placeholder="Побробное описание проекта" rows="6">{{ $project->content or old('content') }}</textarea>
     @if($errors->has('content'))
         <div class="form-group__message_error">{{ $errors->first('content') }}</div>
     @endif
</div>
<div class="form-group">
    <label class="form-group__label" for="rubric">Рубрика</label>
    <select class="select {{ $errors->has('rubric_id') ? 'select_has-error' : '' }}" id="rubric" name="rubric_id">
        <option class="select__option" value="">Без рубрики</option>
        @foreach ($rubrics as $rubric)
            <option class="select__option" value="{{ $rubric->id }}">{{ $rubric->name }}</option>
        @endforeach
    </select>
    @if($errors->has('rubric_id'))
        <div class="form-group__message_error">{{ $errors->first('rubric_id') }}</div>
    @endif
</div>
<div class="form-group">
    <button class="button button_success" type="submit">{{ $submitButtonText }}</button>
</div>
