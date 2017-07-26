<div class="nav">
    <a class="link" href="/">Главная</a>
    <a class="link" href="/admin/projects">Админка проектов</a>
    <a class="link" href="/admin/users">Админка пользователей</a>
    <a class="link" href="/projects">Проекты</a>
    <a class="link" href="/rubrics">Рубрики</a>
    @if(Auth::check())
        <a class="link" href="{{ route('profile.show') }}">{{ Auth::user()->full_name }}</a>
        <a class="link" href="{{ route('logout') }}">Выйти</a>
    @else
        <a class="link" href="{{ route('login') }}">Вход</a>
        <a class="link" href="{{ route('register') }}">Регистрация</a>
    @endif
</div>
