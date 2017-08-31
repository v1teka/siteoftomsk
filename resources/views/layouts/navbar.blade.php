<!--<nav class="navbar navbar-default navbar-fixed-top">
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
            @can('create', 'App\Project')
                <div class="nav__item"><a class="nav__link" href="{{ route('projects.create') }}">Добавить проект</a></div>
            @endcan
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


        <!--<div class="row margin0">
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
                                <li><a href="/projects/3">Здоровый образ жизни</a></li>
                                <li><a href="/projects/4">Гармония с природой</a></li>
                                <li><a href="/projects/5">Мир без барьеров (интересы ЛСОП)</a></li>
                                <li><a href="/projects/6">"Процветающее общество"</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Smart-решения города</a></li>
                        <li><a href="/projects/7">UniverCITerra</a></li>
                        <li><a href="#">Карта позитива</a></li>
                        <li><a href="#">Комната ЛОВЗ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-11 col-lg-11 padding0">
                <div class="row margin0">
                    <div class="col-md-1 padding0 text-left"><a href="#" class="btn btn-default paddingv0 nav-btn-main">Анкета</a></div>
                    <div class="col-md-1 padding0 text-left"><a href="#" class="btn btn-default paddingv0 nav-btn-main">Написать</a></div>
                    <div class="col-md-8 padding0 text-center nav-title">
                        <span class="nav-title">
                            {!! isset($title) ? $title : 'Томск 7.0. Творчество и технологии' !!}
                        </span>
                    </div>
                    <div class="col-md-2 padding0 text-right">
                        <span class="vcenter">
                            @if (Auth::check())
                                <a href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a> / <a href="{{ route('logout') }}">Выход</a>
                            @else
                                <a href="{{ route('login') }}">Вход</a> / <a href="{{ route('register') }}">Регистрация</a>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="row margin0">
                    <div class="col-md-3 text-center padding0">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle navbar-btn dropdown-main nav-btn-main padding0" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                70 Регион
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
                                <li><a href="#">Удобная территория</a></li>
                                <li><a href="#">Экологичное пространство</a></li>
                                <li><a href="#">Комфортная среда</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 text-center padding0">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle navbar-btn dropdown-main nav-btn-main padding0" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Счастливое имя
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">
                                <li><a href="#">Нумерологический паспорт</a></li>
                                <li><a href="#">Города</a></li>
                                <li><a href="#">Кейсы</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 text-center padding0">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle navbar-btn dropdown-main nav-btn-main padding0" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                СемьЯ
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">
                                <li><a href="#">Студенты</a></li>
                                <li><a href="#">Одинокие</a></li>
                                <li><a href="#">Пожилые</a></li>
                                <li><a href="#">Мигранты</a></li>
                                <li><a href="#">ЛСОП</a></li>
                                <li><a href="#">Мамы с маленькими детьми</a></li>
                                <li><a href="#">Семьи с разновозрастными детьми</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 text-center padding0">
                        <a class="btn btn-default paddingv0 nav-btn-main" href="/projects/8">О проекте</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
</nav>-->

<div class="ConteinerNameSite">

    <table class="Link">
        <tr>
            <td rowspan="2" class="OneMenuText">
                <p class="MenuText">
                    Рубрики
                </p>
            </td>
            <td class="OneNameSite">
                <p class="NameSiteText">
                    <a class="LinkNameSiteText" href="/"> ТОМСК 7.0. Творчество и технологии </a>
                </p>
            </td>
            <td class="RegCall">
                @if (Auth::check())
                    <a href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a> / <a href="{{ route('logout') }}">Выход</a>
                @else
                    <a href="{{ route('login') }}">Вход</a> / <a href="{{ route('register') }}">Регистрация</a>
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="2" class="NavBar">
                <table class="Link2">
                    <td class="MenuText2" onclick="$(this).children('ul').css({'left': $(this).offset().left, 'top': $(this).offset().top + $(this).height() - $(document).scrollTop(), 'width': $(this).width()}); $(this).children('ul').show(300);">
                        70 Регион
                        <ul class="UlNavBar">
                            <a href="{{ route('projects.show', 14) }}">
                                <li class="LiNavBar">
                                    Удобная территория
                                </li>
                            </a>
                            <a href="{{ route('projects.show', 15) }}">
                                <li class="LiNavBar">
                                    Экологичное пространство
                                </li>
                            </a>
                            <a href="{{ route('projects.show', 16) }}">
                                <li class="LiNavBar">
                                    Комфортная среда
                                </li>
                            </a>
                        </ul>
                    </td>

                    <td class="MenuText2" onclick="$(this).children('ul').css({'left': $(this).offset().left, 'top': $(this).offset().top + $(this).height() - $(document).scrollTop(), 'width': $(this).width()}); $(this).children('ul').show(300);">
                        Счастливое имя
                        <ul class="UlNavBar">
                            <a href="{{ route('projects.show', 17) }}">
                                <li class="LiNavBar">
                                    Нумерологический паспорт города
                                </li>
                            </a>
                            <a href="{{ route('projects.show', 18) }}">
                                <li class="LiNavBar">
                                    Кейсы
                                </li>
                            </a>
                        </ul>
                    </td>

                    <td class="MenuText2" onclick="$(this).children('ul').css({'left': $(this).offset().left, 'top': $(this).offset().top + $(this).height() - $(document).scrollTop(), 'width': $(this).width()}); $(this).children('ul').show(300);">
                        СемьЯ
                        <ul class="UlNavBar">
                            <a href="{{ route('projects.show', 19) }}">
                                <li class="LiNavBar">
                                    Студенты
                                </li>
                            </a>
                            <a href="{{ route('projects.show', 20) }}">
                                <li class="LiNavBar">
                                    Одинокие
                                </li>
                            </a>
                            <a href="{{ route('projects.show', 21) }}">
                                <li class="LiNavBar">
                                    Пожилые
                                </li>
                            </a>
                            <a href="{{ route('projects.show', 22) }}">
                                <li class="LiNavBar">
                                    Мигранты
                                </li>
                            </a>
                            <a href="{{ route('projects.show', 23) }}">
                                <li class="LiNavBar">
                                    ЛСОП
                                </li>
                            </a>
                            <a href="{{ route('projects.show', 24) }}">
                                <li class="LiNavBar">
                                    Мамы с маленькими детьми
                                </li>
                            </a>
                            <a href="{{ route('projects.show', 25) }}">
                                <li class="LiNavBar">
                                    Семьи с разновозрастными детьми
                                </li>
                            </a>
                        </ul>
                    </td >
                    <a href="{{ route('projects.show', 8) }}">
                        <td class="MenuText2">
                            О проекте
                        </td>
                    </a>
                </table>
            </td>
        </tr>
    </table>
</div>

<div class="overlay"></div>

<div class="BigMenu">
    <ul class="MenuList">
        <a class="MenuListExitToOne" href="{{ route('pages.index') }}">
            <li>
                Главная страница
            </li>
        </a>

        <li class="MenuListExitToALL" onclick="$(this).children('ul').css({'left': $('div.BigMenu').width() + 'px', 'top':$(this).offset().top - $(document).scrollTop()}); $(this).children('ul').show(300);">
            Исследование и аналитика
            <ul class="MenuListTwo">
                <a  href="{{ route('projects.show', 3) }}">
                    <li class="MenuListExitToALLTwo">
                        <p>
                            Здоровый образ жизни
                        </p>
                    </li>
                </a>
                <a  href="{{ route('projects.show', 4) }}">
                    <li class="MenuListExitToALLTwo">
                        <p>
                            Гармония с природой
                        </p>
                    </li>
                </a>
                <a  href="{{ route('projects.show', 5) }}">
                    <li class="MenuListExitToALLTwo">
                        <p>
                            Мир без барьеров (интересы ЛСОП)
                        </p>
                    </li>
                </a>
                <a  href="{{ route('projects.show', 6) }}">
                    <li class="MenuListExitToALLTwo">
                        <p>
                            «Процветающее общество»
                        </p>
                    </li>
                </a>
            </ul>
        </li>

        <a  href="{{ route('projects.show', 10) }}">
            <li class="MenuListExitToALL">
                Smart-решения для города
            </li>
        </a>

        <a  href="{{ route('projects.show', 7) }}">
            <li class="MenuListExitToALL">
                UniverCITerra
            </li>
        </a>

        <a  href="{{ route('projects.show', 11) }}">
            <li class="MenuListExitToALL">
                Карта позитива
            </li>
        </a>

        <a  href="{{ route('projects.show', 12) }}">
            <li class="MenuListExitToALL">
                Комната ЛОВЗ
            </li>
        </a>

        <a  href="{{ route('projects.show', 26) }}">
            <li class="MenuListExitToALL">
                Новости
            </li>
        </a>

        <a  href="{{ route('projects.show', 13) }}">
            <li class="MenuListExitToALL">
                Контакты
            </li>
        </a>
    </ul>

    <div class="BigMenuExit">
        &times;
    </div>

</div>
