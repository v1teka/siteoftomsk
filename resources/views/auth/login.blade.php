@extends('layouts.app')

@section('title', 'Вход на сайт')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Вход на сайт</h1>
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="form-group__label" for="email">Адрес электронной почты</label>
                        <input class="input {{ $errors->has('email') ? 'input_has-error' : '' }}" type="text" name="email" id="email" placeholder="Электронная почта" value="{{ old('email') }}"/>
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
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить
                        </label>
                    </div>
                    <div class="form-group">
                        <button class="button button_success" type="submit">Войти</button>
                        <span><a class="link link_button" href="{{ route('password.request') }}">Забыли пароль?<a></span>
                    </div>
                    <div class="form-group">
                        <span>Если у вас нет учётной записи, <a class="link" href="{{ route('register') }}">зарегистрируйтесь<a>.</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
