{{ csrf_field() }}
<div class="form-group">
    <label class="form-group__label" for="name">Название</label>
    <input class="input {{ $errors->has('name') ? 'input_has-error' : '' }}" type="text" name="name" id="name" placeholder="Название рубрики" value="{{ $rubric->name or old('name') }}" />
    @if($errors->has('name'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('name') }}</div>
    @endif
</div>
<div class="form-group">
    <label class="form-group__label" for="description">Описание</label>
    <textarea class="textarea {{ $errors->has('description') ? 'textarea_has-error' : '' }}" name="description" id="description" placeholder="Описание рубрики" rows="3">{{ $rubric->description or old('description') }}</textarea>
    @if($errors->has('description'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('description') }}</div>
    @endif
</div>
<div class="form-group">
    <label class="form-group__label" for="slug">URL</label>
    <input class="input {{ $errors->has('slug') ? 'input_has-error' : '' }}" type="text" name="slug" id="slug" placeholder="URL" value="{{ $rubric->slug or old('slug') }}" />
    @if($errors->has('slug'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('slug') }}</div>
    @endif
    <div class="form-group__message form-group__message--help">Строчные латинские буквы, цифры и тире. Например, smart или smart-city.</div>
</div>
<div class="form-group">
    <button class="button button_success" type="submit">{{ $submitButtonText }}</button>
</div>
