<div class="navbar">
    <div class="navbar__logo">
        <a class="link navbar__logo-link" href="/" title="Томск 7.0. Технологии и творчество">Томск 7.0</a>
    </div>
    <div class="navbar__content">
        <a class="link navbar__link" href="">О проекте</a>
        <a class="link navbar__link" href="">Новости</a>
        <a class="link navbar__link" href="">Карта позитива</a>
        <a class="link navbar__link" href="">Экология</a>
        <a class="link navbar__link" href="">Креатив</a>
        <a class="link navbar__link" href="">Мнения</a>
    </div>
    <div class="navbar__right">
        @if(Auth::check())
            <a class="link navbar__link" href="">{{ Auth::user()->full_name }}</a>
            <a class="link navbar__link" href="{{ route('logout') }}">Выйти</a>
        @else
            <a class="link navbar__link" href="{{ route('login') }}">Вход</a>
            <a class="link navbar__link" href="{{ route('register') }}">Регистрация</a>
        @endif
    </div>
</div>
