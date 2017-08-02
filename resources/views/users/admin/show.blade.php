@extends('dashboard.index')

@section('title', $user->full_name)

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <div class="form-group">
                    <label class="form-group__label">Имя</label>
                    <div class="form-group__value">{{ $user->name }}</div>
                </div>
                <div class="form-group">
                    <label class="form-group__label">Фамилия</label>
                    <div class="form-group__value">{{ $user->surname }}</div>
                </div>
                <div class="form-group">
                    <label class="form-group__label">Адрес электронной почты</label>
                    <div class="form-group__value"><a class="link" href="mailto:{{ $user->email }}">{{ $user->email }}</a></div>
                </div>
                <div class="form-group">
                    <label class="form-group__label">Дата регистрации</label>
                    <div class="form-group__value">{{ $user->created_at->format('d.m.Y H:i:s') }}</div>
                </div>

                @include('users.admin.form')
                
            </div>
        </div>
    </div>
@endsection
