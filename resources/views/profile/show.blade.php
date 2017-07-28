@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Профиль</h1>
                <form method="POST" action="{{ route('profile.update') }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label class="form-group__label" for="name">Имя</label>
                        <input class="input {{ $errors->has('name') ? 'input_has-error' : '' }}" type="text" name="name" id="name" placeholder="Имя" value="{{ $user->name or old('name') }}" />
                        @if($errors->has('name'))
                            <div class="form-group__message_error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-group__label" for="surname">Фамилия</label>
                        <input class="input {{ $errors->has('surname') ? 'input_has-error' : '' }}" type="text" name="surname" id="surname" placeholder="Фамилия" value="{{ $user->surname or old('surname') }}" />
                        @if($errors->has('surname'))
                            <div class="form-group__message_error">{{ $errors->first('surname') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-group__label" for="email">Адрес электронной почты</label>
                        <input class="input {{ $errors->has('email') ? 'input_has-error' : '' }}" type="text" name="email" id="email" placeholder="Адрес электронной почты" value="{{ $user->email or old('email') }}" />
                        @if($errors->has('email'))
                            <div class="form-group__message_error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-group__label" for="old-password">Текущий пароль</label>
                        <input class="input {{ $errors->has('old_password') ? 'input_has-error' : '' }}" type="password" name="old_password" id="old-password" placeholder="Текущий пароль" />
                        @if($errors->has('old_password'))
                            <div class="form-group__message_error">{{ $errors->first('old_password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-group__label" for="password">Новый пароль</label>
                        <input class="input {{ $errors->has('password') ? 'input_has-error' : '' }}" type="password" name="password" id="password" placeholder="Новый пароль" />
                        @if($errors->has('password'))
                            <div class="form-group__message_error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-group__label" for="password-confirm">Подтверждение пароля</label>
                        <input class="input {{ $errors->has('password_confirmation') ? 'input_has-error' : '' }}" type="password" name="password_confirmation" id="password-confirm" placeholder="Подтверждение пароля" />
                        @if($errors->has('password_confirmation'))
                            <div class="form-group__message_error">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="button button_success" type="submit">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
