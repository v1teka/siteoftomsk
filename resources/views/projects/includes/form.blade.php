<form method="POST" action="{{ $actionPath }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Название</label>
        <input class="form-control {{ $errors->has('title') ? 'input_has-error' : '' }}" type="text" name="title" id="title" placeholder="Название проекта" value="{{ isset($project->title) ? $project->title : old('title') }}" />
        @if($errors->has('title'))
            <div class="form-group__message form-group__message--error">{{ $errors->first('title') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control {{ $errors->has('description') ? 'textarea_has-error' : '' }}" name="description" id="description" placeholder="Краткое описание проекта" rows="3">{{ isset($project->description) ? $project->description : old('description') }}</textarea>
        @if($errors->has('description'))
            <div class="form-group__message form-group__message--error">{{ $errors->first('description') }}</div>
        @endif
        <div class="help-block">Отображается в карточке проекта.</div>
    </div>
    <div class="form-group">
        <label for="prj-content">Контент</label>
        <textarea class="form-control project-content {{ $errors->has('content') ? 'textarea_has-error' : '' }}" name="content" id="content" placeholder="Побробное описание проекта" rows="6">{{ isset($project->content) ? $project->content : old('content') }}</textarea>
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
            <option class="select__option" value="0" {{ (isset($project) && $project->show_on_main_page == 0) ? 'selected' : '' }}>Нет</option>
            @for ($i = 1 ; $i < 12; $i++)
                <option class="select__option" value="{{ $i }}" {{ (isset($project) && $project->show_on_main_page == $i) ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
        @if($errors->has('show_on_main_page'))
            <div class="form-group__message form-group__message--error">{{ $errors->first('show_on_main_page') }}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="image">Изображение</label>
        @if (isset($project) && isset($project->image))
            <div class="form-group__value">
                <img class="form-group__image-preview" src="{{ Storage::disk('public')->url($project->image) }}" height="100"/>
            </div>
        @endif
        <input class="file" type="file" name="image" id="image" accept="image/png,image/jpeg">
        @if($errors->has('image'))
            <div class="form-group__message form-group__message--error">{{ $errors->first('image') }}</div>
        @endif
        <div class="help-block">Поддерживаются файлы .jpeg, .jpg и .png шириной от 1000 пикс. и размером не более 30&nbsp;Мб.</div>
    </div>
    <div class="form-group">
        <label for="form">Анкета</label>
        <textarea class="form-control {{ $errors->has('form') ? 'textarea_has-error' : '' }}" name="form" id="form" placeholder="Ссылка на форму" rows="3">{{ isset($project->form) ? $project->form : old('form') }}</textarea>
        @if($errors->has('form'))
            <div class="form-group__message form-group__message--error">{{ $errors->first('form') }}</div>
        @endif
        <div class="help-block">Рекомендуется использовать <a class="link" href="https://www.google.ru/intl/ru/forms/about/" target="_blank">Google Forms</a>.</div>
    </div>
    <div class="form-group">
        <label class="form-group__label" for="files">Файлы</label>
        @if (isset($project->files))
            <div class="form-group__value">
                @foreach ($project->files as $file)
                    <p>
                        <input type="checkbox" name="deleted_files[{{ $file->id }}]" id="file-{{ $file->id }}">
                        <label for="file-{{ $file->id }}">Удалить</label>&nbsp;<a class="link file-link file-link--{{$file->extension}}" href="{{ Storage::disk('public')->url($file->path) }}" target="_blank">{{ $file->name }}</a>
                    </p>
                @endforeach
            </div>
        @endif
        <input class="file" type="file" name="files[]" id="files" multiple>
        @if($errors->has('files.*'))
            <div class="form-group__message form-group__message--error">{{ $errors->first('files.*') }}</div>
        @endif
        <div class="help-block">Рекомендуется загружать файлы в формате PDF. Преобразовать файл онлайн можно с помощью сервиса <a class="link" href="https://smallpdf.com/pdf-converter" target="_blank">Smallpdf</a>.</div>
        <div class="help-block">Поддерживаются документы .pdf, .doc, .docx, .ppt, .pptx, .xls, .xlsx, изображения .jpg и .png размером не более 30&nbsp;Мб.</div>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit" style="float: left;">{{ $submitButtonText }}</button>
    </div>
</form>
@if (isset($project))
    <!--<form method="POST" action="{{ route('projects.destroy', $project) }}" enctype="multipart/form-data" style="float: left;">-->
    <form id="project_delete_form" action="{{ route('projects.destroy', $project) }}" method="POST">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <div class="form-group">
            <button class="btn btn-danger" type="submit" id="project_delete_btn">Удалить проект</button>
        </div>
    </form>
    <div style="clear: both;"></div>
@endif

@push('scripts')
<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
<!--<script type="text/javascript" src="{{ asset('/js/projectDelete.js') }}"></script>-->
<script>
    window.onload = function() {
        CKEDITOR.replace('content', {
            //customConfig: '{{ asset("/assets/ckeditor/config/project.js") }}' // Не могу понять причину, почему не подключаются модули (например, загрузки изображений) в случае, если используется этот конфиг, даже с аналогичными настройками внутри
        });
        $('#project_delete_form').submit(function(e) {
            var currentForm = this;
            e.preventDefault();
            bootbox.confirm({
                message: "Вы действительно хотите удалить проект?",
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
