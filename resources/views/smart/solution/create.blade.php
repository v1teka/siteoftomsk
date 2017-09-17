@extends('dashboard.index')

@section('title', 'Добавить раздел Smart-решения')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('smart.solutions.store.admin.index') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="section">Раздел</label>
                        <select class="form-control {{ $errors->has('smart_section_id') ? 'select_has-error' : '' }}" id="section" name="smart_section_id">
                            @foreach ($sections as $section)
                                <option class="select__option" value="{{ $section->id }}" {{ (isset($sectuion) && $section->id == $project->rubric_id) ? 'selected' : '' }}>{{ $section->title }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('smart_section_id'))
                            <div class="form-group__message form-group__message--error">{{ $errors->first('smart_section_id') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">Описание</label>
                        <input class="form-control {{ $errors->has('title') ? 'input_has-error' : '' }}" type="text" name="description" id="description" placeholder="Описание Smart-решения" value="{{ $smartSolution->description or old('description') }}" />
                        @if($errors->has('title'))
                            <div class="form-group__message_error">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
