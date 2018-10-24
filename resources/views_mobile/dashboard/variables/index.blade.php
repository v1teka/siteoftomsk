@extends('dashboard.index')

@push('scripts')
@endpush

@section('title', 'Ссылка на анкету')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('variables.admin.update', $variable->getAttributes()['name']) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="name">{!! $variable->comment !!}</label>
                        <input class="form-control {{ $errors->has('name') ? 'input_has-error' : '' }}" type="text" name="name" id="name" placeholder="Имя" value="{{ $variable->value or old('value') }}" />
                        @if($errors->has('name'))
                            <div class="form-group__message form-group__message--error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
