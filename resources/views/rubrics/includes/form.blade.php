{{ csrf_field() }}
<div class="form-group">
    <label for="name">Название</label>
    <input class="form-control {{ $errors->has('name') ? 'input_has-error' : '' }}" type="text" name="name" id="name" placeholder="Название рубрики" value="{{ $rubric->name or old('name') }}" />
    @if($errors->has('name'))
        <div class="form-group__message_error">{{ $errors->first('name') }}</div>
    @endif
</div>
<div class="form-group">
    <label for="description">Описание</label>
    <textarea class="form-control {{ $errors->has('description') ? 'textarea_has-error' : '' }}" name="description" id="description" placeholder="Описание рубрики" rows="3">{{ $rubric->description or old('description') }}</textarea>
    @if($errors->has('description'))
        <div class="form-group__message_error">{{ $errors->first('description') }}</div>
    @endif
</div>
<div class="form-group">
    <label for="slug">URL</label>
    <input class="form-control {{ $errors->has('slug') ? 'input_has-error' : '' }}" type="text" name="slug" id="slug" placeholder="URL" value="{{ $rubric->slug or old('slug') }}" />
    @if($errors->has('slug'))
        <div class="form-group__message_error">{{ $errors->first('slug') }}</div>
    @endif
    <div class="form-group__help">Строчные латинские буквы, цифры и тире. Например, smart или smart-city.</div>
</div>
<div class="form-group">
    <button class="btn btn-success" type="submit">{{ $submitButtonText }}</button>
</div>
