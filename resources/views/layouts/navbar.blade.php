<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!--<div class="navbar-header">
            <a class="nav-brand__link" href="{{ route('pages.index') }}">Томск 7.0</a>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle navbar-btn" type="button" id="dropdownMenu11" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Рубрики
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu11">
                    <li><a href="{{ route('pages.index') }}">Главная страница</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Исследование и аналитика</a></li>
                    <li><a href="#">Smart-решения города</a></li>
                    <li><a href="#">UniverCITerra</a></li>
                    <li><a href="#">СемьЯ</a></li>
                    <li><a href="#">Виртуальная прогулка</a></li>
                    <li><a href="#">Экономика города</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Новости</a></li>
                    <li><a href="#">О проекте</a></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </div>
        </div>-->
        <!--<div class="nav-mobile js-nav-mobile-toggle">
            <a class="nav-mobile__toggle" href="#"><span class="nav-mobile__content"></span></a>
        </div>-->
        <!--<div class="nav__menu">
            <div class="nav__item"><a class="nav__link" href="{{ route('projects.index') }}">Проекты</a></div>
            <div class="nav__item"><a class="nav__link" href="{{ route('rubrics.index') }}">Рубрики</a></div>
            @if (Auth::check() && (Auth::user()->can('administrate', 'App\Project') || Auth::user()->can('administrate', 'App\Rubric') || Auth::user()->can('administrate', 'App\User')))
                <div class="nav__item">
                    <a class="nav__link nav__link--dropdown js-nav-dropdown-link" href="#!">Администрирование</a>
                    <div class="nav__dropdown js-nav-dropdown-content">
                        @can('administrate', 'App\Project')
                            <div class="nav__item nav__item--sub"><a class="nav__link" href="{{ route('projects.admin.index') }}">Проекты</a></div>
                        @endcan
                        @can('administrate', 'App\Rubric')
                            <div class="nav__item nav__item--sub"><a class="nav__link" href="{{ route('rubrics.admin.index') }}">Рубрики</a></div>
                        @endcan
                        @can('administrate', 'App\User')
                            <div class="nav__item nav__item--sub"><a class="nav__link" href="{{ route('users.admin.index') }}">Пользователи</a></div>
                        @endcan
                    </div>
                </div>
            @endif
            <div class="nav__item nav__item--login">
                @if (Auth::check())
                    <div class="nav__item"><a class="nav__link" href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a></div>
                    <div class="nav__item"><a class="nav__link" href="{{ route('logout') }}">Выйти</a></div>
                @else
                    <div class="nav__item"><a class="nav__link" href="{{ route('login') }}">Вход</a></div>
                    <div class="nav__item"><a class="nav__link" href="{{ route('register') }}">Регистрация</a></div>
                @endif
            </div>
        </div>-->
        <!--<div id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="#" class="app-nav-header-name ease-fontsize-transition" id="app-nav-header-name">Томск 7.0. Технологии и творчество</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li><a id="nav-username" class="ease-fontsize-transition" href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a></li>
                        <li><a id="nav-logout" class="ease-fontsize-transition" href="{{ route('logout') }}">Выйти</a></li>
                    @else
                        <li><a id="nav-login" class="ease-fontsize-transition" href="{{ route('login') }}">Вход</a></li>
                        <li><a id="nav-register" class="ease-fontsize-transition" href="{{ route('register') }}">Регистрация</a></li>
                    @endif
                </li>
            </ul>
        </div>-->
        <div class="row">
            <div class="col-md-1 col-lg-1">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle navbar-btn" type="button" id="dropdownMenu11" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Рубрики
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu11">
                        <li><a href="{{ route('pages.index') }}">Главная страница</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Исследование и аналитика</a></li>
                        <li><a href="#">Smart-решения города</a></li>
                        <li><a href="#">UniverCITerra</a></li>
                        <li><a href="#">СемьЯ</a></li>
                        <li><a href="#">Виртуальная прогулка</a></li>
                        <li><a href="#">Экономика города</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Новости</a></li>
                        <li><a href="#">О проекте</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-11 col-lg-11">
                <div class="row">
                    <div class="col-md-1 text-left"><a href="#" class="btn btn-default paddingv0">Анкета</a></div>
                    <div class="col-md-1 text-left"><a href="#" class="btn btn-default paddingv0">Написать</a></div>
                    <div class="col-md-8 text-center"><strong>{!! isset($title) ? $title : 'Пример длинного заголовка' !!}</strong></div>
                    <div class="col-md-2 text-right">
                        @if (Auth::check())
                            <a href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a> / <a href="{{ route('logout') }}">Выход</a>
                        @else
                            <a href="{{ route('login') }}">Вход</a> / <a href="{{ route('register') }}">Регистрация</a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 text-center"><a class="btn btn-default paddingv0" href="#">Рубрика 1</a></div>
                    <div class="col-md-4 text-center"><a class="btn btn-default paddingv0" href="#">Рубрика 2</a></div>
                    <div class="col-md-4 text-center"><a class="btn btn-default paddingv0" href="#">О проекте</a></div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
</nav>
