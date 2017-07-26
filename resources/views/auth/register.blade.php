@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Регистрация</h1>
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="form-group__label" for="name">Имя</label>
                        <input class="input {{ $errors->has('name') ? 'input_has-error' : '' }}" type="text" name="name" id="name" placeholder="Иван" value="{{ old('name') }}"/>
                        @if($errors->has('name'))
                            <div class="form-group__message_error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-group__label" for="surname">Фамилия</label>
                        <input class="input {{ $errors->has('surname') ? 'input_has-error' : '' }}" type="text" name="surname" id="surname" placeholder="Иванов" value="{{ old('surname') }}" />
                        @if($errors->has('surname'))
                            <div class="form-group__message_error">{{ $errors->first('surname') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-group__label" for="email">Адрес электронной почты</label>
                        <input class="input {{ $errors->has('email') ? 'input_has-error' : '' }}" type="text" name="email" id="email" placeholder="hi@solopchenko.net" value="{{ old('email') }}" />
                        @if($errors->has('email'))
                            <div class="form-group__message_error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-group__label" for="password">Пароль</label>
                        <input class="input {{ $errors->has('password') ? 'input_has-error' : '' }}" type="password" name="password" id="password" placeholder="Пароль" />
                        @if($errors->has('password'))
                            <div class="form-group__message_error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-group__label" for="password-confirm">Подтверждение пароля</label>
                        <input class="input {{ $errors->has('password_confirmation') ? 'input_has-error' : '' }}" type="password" name="password_confirmation" id="password-confirm" placeholder="Подтверждение пароля" />
                        @if($errors->has('email'))
                            <div class="form-group__message_error">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <span>Регистрируясь, вы принимаете условия <a class="link" href="">соглашения<a> и даёте право на обработку персональных данных.</span>
                    </div>
                    <div class="form-group">
                        <button class="button button_success" type="submit">Зарегистрирваться</button>
                    </div>
                    <div class="form-group">
                        <span>Если у вас есть учётная записи, <a class="link" href="{{ route('login') }}">войдите<a>.</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
