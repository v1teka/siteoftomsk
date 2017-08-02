@extends('dashboard.index')

@section('title', 'Список пользователей')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container-fluid">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Имя</th>
                            <th>Почта</th>
                            <th>Дата регистрации</th>
                            <th>Роли</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a class="link" href="{{ route('users.admin.show', $user) }}">{{ $user->full_name }}</td>
                                <td><a class="link" href="mailto:{{ $user->email }}">{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d.m.Y H:i:s') }}</td>
                                <td>
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
