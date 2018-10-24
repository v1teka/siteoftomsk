@extends('dashboard.index')

@section('title', 'Редактирование Smart-решения')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('smart.solutions.update.admin.index', $smartSolution) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="form-group__label" for="section">Раздел</label>
                        <select class="select {{ $errors->has('smart_section_id') ? 'select_has-error' : '' }}" id="smart_section_id" name="smart_section_id">
                            @foreach ($sections as $section)
                                <option class="select__option" value="{{ $section->id }}" {{ $section->id == $smartSolution->smart_section_id ? 'selected' : ''}}>{{ $section->title }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('smart_section_id'))
                            <div class="form-group__message form-group__message--error">{{ $errors->first('smart_section_id') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">Описание</label>
                        <input class="form-control {{ $errors->has('title') ? 'input_has-error' : '' }}" type="text" name="description" id="description" placeholder="Название Smart-решения" value="{{ $smartSolution->description or old('description') }}" />
                        @if($errors->has('description'))
                            <div class="form-group__message_error">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">Отображать на странице</label>
                        <input type="checkbox" name="visible" id="visible" placeholder="Отображать ли на странице?" {{ $smartSolution->visible or old('visible') ? 'checked' : '' }} />
                        @if($errors->has('visible'))
                            <div class="form-group__message_error">{{ $errors->first('visible') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Изменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
