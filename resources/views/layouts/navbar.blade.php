<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid padding0">
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
        <div class="row margin0">
            <div class="col-md-1 col-lg-1 padding0">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle navbar-btn dropdown-main" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Рубрики
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <li><a href="{{ route('pages.index') }}">Главная страница</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-submenu">
                            <a href="#">Исследование и аналитика</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Здоровый образ жизни</a></li>
                                <li><a href="#">Гармония с природой</a></li>
                                <li><a href="#">Мир без барьеров (интересы ЛСОП)</a></li>
                                <li><a href="#">"Процветающее общество"</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Smart-решения города</a></li>
                        <li><a href="#">UniverCITerra</a></li>
                        <li><a href="#">Карта позитива</a></li>
                        <li><a href="#">Комната ЛОВЗ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-11 col-lg-11 padding0">
                <div class="row margin0">
                    <div class="col-md-1 padding0 text-left"><a href="#" class="btn btn-default paddingv0 nav-btn-main">Анкета</a></div>
                    <div class="col-md-1 padding0 text-left"><a href="#" class="btn btn-default paddingv0 nav-btn-main">Написать</a></div>
                    <div class="col-md-8 padding0 text-center"><strong>{!! isset($title) ? $title : 'Томск 7.0. Творчество и технологии' !!}</strong></div>
                    <div class="col-md-2 padding0 text-right">
                        @if (Auth::check())
                            <a href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a> / <a href="{{ route('logout') }}">Выход</a>
                        @else
                            <a href="{{ route('login') }}">Вход</a> / <a href="{{ route('register') }}">Регистрация</a>
                        @endif
                    </div>
                </div>
                <div class="row margin0">
                    <div class="col-md-3 text-center padding0"><a class="btn btn-default paddingv0 nav-btn-main" href="#">70 Регион</a></div>
                    <div class="col-md-3 text-center padding0"><a class="btn btn-default paddingv0 nav-btn-main" href="#">Счастливое имя</a></div>
                    <div class="col-md-3 text-center padding0"><a class="btn btn-default paddingv0 nav-btn-main" href="#">СемьЯ</a></div>
                    <div class="col-md-3 text-center padding0"><a class="btn btn-default paddingv0 nav-btn-main" href="#">О проекте</a></div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
</nav>