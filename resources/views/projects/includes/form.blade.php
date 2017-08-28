{{ csrf_field() }}
<div class="form-group">
    <label for="title">Название</label>
    <input class="form-control {{ $errors->has('title') ? 'input_has-error' : '' }}" type="text" name="title" id="title" placeholder="Название проекта" value="{{ $project->title or old('title') }}" />
    @if($errors->has('title'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('title') }}</div>
    @endif
</div>
<div class="form-group">
    <label for="description">Описание</label>
    <textarea class="form-control {{ $errors->has('description') ? 'textarea_has-error' : '' }}" name="description" id="description" placeholder="Краткое описание проекта" rows="3">{{ $project->description or old('description') }}</textarea>
    @if($errors->has('description'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('description') }}</div>
    @endif
    <div class="form-group__message form-group__message--help">Отображается в карточке проекта. Максимум 255 символов.</div>
</div>
<div class="form-group">
    <label for="prj-content">Контент</label>
     <textarea class="form-control {{ $errors->has('content') ? 'textarea_has-error' : '' }}" name="content" id="content" placeholder="Побробное описание проекта" rows="6">{{ $project->content or old('content') }}</textarea>
     @if($errors->has('content'))
         <div class="form-group__message form-group__message--error">{{ $errors->first('content') }}</div>
     @endif
</div>
<div class="form-group">
    <label for="rubric">Рубрика</label>
    <select class="form-control {{ $errors->has('rubric_id') ? 'select_has-error' : '' }}" id="rubric" name="rubric_id">
        <option class="select__option" value="">Без рубрики</option>
        @foreach ($rubrics as $rubric)
            <option class="select__option" value="{{ $rubric->id }}" {{ (isset($project) && $rubric->id == $project->rubric_id) ? 'selected' : '' }}>{{ $rubric->name }}</option>
        @endforeach
    </select>
    @if($errors->has('rubric_id'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('rubric_id') }}</div>
    @endif
</div>
<div class="form-group">
    <label for="show_on_main_page">Показывать на главной странице</label>
    <select class="form-control {{ $errors->has('show_on_main_page') ? 'select_has-error' : '' }}" id="show_on_main_page" name="show_on_main_page">
        <option class="select__option" value="0" {{ $project->show_on_main_page == 0 ? 'selected' : '' }}>Нет</option>
        @for ($i = 1 ; $i < 12; $i++)
            <option class="select__option" value="{{ $i }}" {{ $project->show_on_main_page == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
    @if($errors->has('show_on_main_page'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('show_on_main_page') }}</div>
    @endif
</div>
<div class="form-group">
    <label for="image">Изображение</label>
    @isset($project->image)
        <div class="form-group__value">
            <img class="form-group__image-preview" src="{{ Storage::disk('public')->url($project->image) }}" height="100"/>
        </div>
    @endisset
    <input class="file" type="file" name="image" id="image" accept="image/png,image/jpeg">
     @if($errors->has('image'))
         <div class="form-group__message form-group__message--error">{{ $errors->first('image') }}</div>
     @endif
     <div class="form-group__message form-group__message--help">Поддерживаются файлы .jpeg, .jpg и .png шириной от 1200 пикс. и размером не более 2&nbsp;Мб.</div>
</div>
<div class="form-group">
    <label for="form">Анкета</label>
    <textarea class="form-control {{ $errors->has('form') ? 'textarea_has-error' : '' }}" name="form" id="form" placeholder="Ссылка на форму" rows="3">{{ $project->form or old('form') }}</textarea>
    @if($errors->has('form'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('form') }}</div>
    @endif
    <div class="form-group__message form-group__message--help">Рекомендуется использовать <a class="link" href="https://www.google.ru/intl/ru/forms/about/" target="_blank">Google Forms</a>.</div>
</div>
<div class="form-group">
    <label class="form-group__label" for="files">Файлы</label>
    @isset($project->files)
        <div class="form-group__value">
            @foreach ($project->files as $file)
                <p>
                    <input type="checkbox" name="deleted_files[{{ $file->id }}]" id="file-{{ $file->id }}">
                    <label for="file-{{ $file->id }}">Удалить</label><a class="link file-link file-link--{{$file->extension}}" href="{{ Storage::disk('public')->url($file->path) }}" target="_blank">{{ $file->name }}</a>
                </p>
            @endforeach
        </div>
    @endisset
    <input class="file" type="file" name="files[]" id="files" multiple>
    @if($errors->has('files.*'))
        <div class="form-group__message form-group__message--error">{{ $errors->first('files.*') }}</div>
    @endif
     <div class="form-group__message form-group__message--help">Рекомендуется загружать файлы в формате PDF. Преобразовать файл онлайн можно с помощью сервиса <a class="link" href="https://smallpdf.com/pdf-converter" target="_blank">Smallpdf</a>.</div>
     <div class="form-group__message form-group__message--help">Поддерживаются документы .pdf, .doc, .docx, .ppt, .pptx, .xls, .xlsx, изображения .jpg и .png размером не более 2&nbsp;Мб.</div>
</div>
<div class="form-group">
    <button class="btn btn-success" type="submit" style="float: left;">{{ $submitButtonText }}</button>
</div>
<form method="POST" action="{{ route('projects.destroy', $project) }}" enctype="multipart/form-data" style="float: left;">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <div class="form-group">
        <button class="btn btn-danger" type="submit">Удалить проект</button>
    </div>
</form>


@push('scripts')
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
    <script>
        window.onload = function() {
            CKEDITOR.replace('content', {
		        //customConfig: '{{ asset("/assets/ckeditor/config/project.js") }}' // Не могу понять причину, почему не подключаются модули (например, загрузки изображений) в случае, если используется этот конфиг, даже с аналогичными настройками внутри
	        });
        }
    </script>
@endpush
