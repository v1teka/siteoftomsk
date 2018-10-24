@extends('dashboard.index')

@section('title', 'Добавить раздел Smart-решения')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('smart.sections.store.admin.index') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Наименование</label>
                        <input class="form-control {{ $errors->has('title') ? 'input_has-error' : '' }}" type="text" name="title" id="title" placeholder="Название раздела Smart-решения" value="{{ $smartSection->title or old('title') }}" />
                        @if($errors->has('title'))
                            <div class="form-group__message_error">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="img">Изображение</label>
                        @if (isset($smartSection) && isset($smartSection->img_path))
                            <div class="form-group__value">
                                <img class="form-group__image-preview" src="{{ Storage::disk('public')->url($smartSection->img_path) }}" height="100"/>
                            </div>
                        @endif
                        <input class="file" type="file" name="img" id="img" accept="image/png,image/jpeg">
                        @if($errors->has('img'))
                            <div class="form-group__message form-group__message--error">{{ $errors->first('img') }}</div>
                        @endif
                        <div class="help-block">Поддерживаются файлы .jpeg, .jpg и .png</div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
