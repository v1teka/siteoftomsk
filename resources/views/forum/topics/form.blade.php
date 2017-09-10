{{ csrf_field() }}
<div class="form-group">
    <label class="form-group__label" for="forum_section_id">Раздел форума</label>
    <select class="select {{ $errors->has('forum_section_id') ? 'select_has-error' : '' }}" id="forum_section_id" name="forum_section_id">
        <option class="select__option" value="">Выберите раздел</option>
        @foreach ($sections as $section)
            <option class="select__option" value="{{ $section->id }}" {{ isset($topic)  && $section->id == $topic->forum_section_id ? 'selected' : ''}}>{{ $section->title }}</option>
        @endforeach
    </select>
    @if($errors->has('forum_section_id'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('forum_section_id') }}</div>
    @endif
</div>
<div class="form-group">
    <label class="form-group__label" for="title">Название</label>
    <input class="input {{ $errors->has('title') ? 'input_has-error' : '' }}" type="text" name="title" id="title" placeholder="Тема обсуждения" value="{{ $topic->title or old('title') }}" />
    @if($errors->has('title'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('title') }}</div>
    @endif
</div>
<div class="form-group">
    <label class="form-group__label" for="description">Описание</label>
    <textarea class="textarea {{ $errors->has('description') ? 'textarea_has-error' : '' }}" name="description" id="description" placeholder="Краткое описание темы обсуждения" rows="2">{{ $topic->description or old('description') }}</textarea>
    @if($errors->has('description'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('description') }}</div>
    @endif
</div>

<div class="form-group">
    <button class="button button--success" type="submit">{{ $submitButtonText }}</button>
</div>
