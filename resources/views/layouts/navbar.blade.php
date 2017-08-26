<nav class="nav">
    <div class="nav-lead">
        <div class="nav-toggle js-nav-toggle">
            <span class="nav-toggle__burger"></span>
        </div>
        <div class="nav-brand">
            <a class="nav__link" href="{{ route('pages.index') }}" title="Томск 7.0">
                <span class="nav-brand__text">Томск 7.0</span>
                <span class="nav-brand__text nav-brand__text--sub">Технологии и творчество</span>
            </a>
        </div>
        <div class="nav-login">
            @if (Auth::check())
                <a class="nav__link" href="{{ route('profile.show') }}" title="Профиль"><span class="icon icon--user"></span></a>
                <a class="nav__link" href="{{ route('logout') }}" title="Выйти"><span class="icon icon--logout"></span></a>
            @else
                <a class="nav__link" href="{{ route('login') }}" title="Вход"><span class="icon icon--login"></span></a>
                <a class="nav__link" href="{{ route('register') }}" title="Регистрация"><span class="icon icon--user-add"></span></a>
            @endif
        </div>
    </div>

    <div class="nav-menu js-nav-toggle-content">
        <div class="nav__item">
            <a class="nav__link js-nav-dropdown-link" href="">70 регион</a>
            <div class="nav__dropdown js-nav-dropdown-content">
                <a class="nav__link nav__link--sub" href="">Удобная территория</a>
                <a class="nav__link nav__link--sub" href="">Экологичное пространство</a>
                <a class="nav__link nav__link--sub" href="">Комфортная среда</a>
            </div>
        </div>
        <div class="nav__item">
            <a class="nav__link js-nav-dropdown-link" href="">Счастливое имя</a>
            <div class="nav__dropdown js-nav-dropdown-content">
                <a class="nav__link nav__link--sub" href="">Нумерологический паспорт города</a>
                <a class="nav__link nav__link--sub" href="">Кейсы</a>
            </div>
        </div>
        <div class="nav__item">
            <a class="nav__link js-nav-dropdown-link" href="">СемьЯ</a>
            <div class="nav__dropdown js-nav-dropdown-content">
                <a class="nav__link nav__link--sub" href="">Студенты</a>
                <a class="nav__link nav__link--sub" href="">Одинокие</a>
                <a class="nav__link nav__link--sub" href="">Пожилые</a>
                <a class="nav__link nav__link--sub" href="">Мигранты</a>
                <a class="nav__link nav__link--sub" href="">ЛСОП</a>
                <a class="nav__link nav__link--sub" href="">Мамы с маленькими детьми</a>
                <a class="nav__link nav__link--sub" href="">Семьи с разновозрастными детьми</a>
            </div>
        </div>
        <div class="nav__item">
            <a class="nav__link js-nav-dropdown-link" href="">Рубрики</a>
            <div class="nav__dropdown js-nav-dropdown-content">
                <a class="nav__link nav__link--sub" href="">Исследование и аналитика</a>
                <a class="nav__link nav__link--sub" href="">Умные решения для города</a>
                <a class="nav__link nav__link--sub" href="">Карта позитива</a>
            </div>
        </div>
        <div class="nav__item">
            <a class="nav__link" href="{{ route('pages.about') }}">О проекте</a>
        </div>
    </div>
</nav>
