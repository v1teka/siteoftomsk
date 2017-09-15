{{ csrf_field() }}
<div class="form-group">
    <label class="form-group__label" for="title">Название</label>
    <input class="input {{ $errors->has('title') ? 'input_has-error' : '' }}" type="text" name="title" id="title" placeholder="Название раздела" value="{{ $section->title or old('title') }}" />
    @if($errors->has('title'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('title') }}</div>
    @endif
</div>
<div class="form-group">
    <label class="form-group__label" for="description">Описание</label>
    <textarea class="textarea {{ $errors->has('description') ? 'textarea_has-error' : '' }}" name="description" id="description" placeholder="Краткое описание раздела" rows="2">{{ $section->description or old('description') }}</textarea>
    @if($errors->has('description'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('description') }}</div>
    @endif
</div>

<div class="form-group">
    <button class="button button--success" type="submit">{{ $submitButtonText }}</button>
</div>
