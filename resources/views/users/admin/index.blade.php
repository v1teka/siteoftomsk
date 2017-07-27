@extends('layouts.app')

@section('title', 'Список пользователей')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Список пользователей</h1>
                <table class="table">
                    <thead class="table__head">
                        <tr class="table__row">
                            <td class="table__column">№</td>
                            <td class="table__column">Имя</td>
                            <td class="table__column">Почта</td>
                            <td class="table__column">Дата регистрации</td>
                            <td class="table__column">Роли</td>
                        </tr>
                    </thead>
                    <tbody class="table__body">
                        @foreach ($users as $user)
                            <tr class="table__row">
                                <td class="table__column">{{ $user->id }}</td>
                                <td class="table__column"><a class="link" href="{{ route('users.admin.show', $user) }}">{{ $user->full_name }}</td>
                                <td class="table__column"><a class="link" href="mailto:{{ $user->email }}">{{ $user->email }}</td>
                                <td class="table__column">{{ $user->created_at->format('d.m.Y H:i:s') }}</td>
                                <td class="table__column">
                                    @if ($user->roles->count())
                                        {!! $user->rolesToStr('<br>') !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links('layouts.pagination') }}
            </div>
        </div>
    </div>
@endsection
