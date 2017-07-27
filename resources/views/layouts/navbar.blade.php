<div class="navigation">
    <nav class="nav">
        <div class="nav-brand">
            <a class="nav-brand__link" href="{{ route('pages.index') }}">Томск 7.0</a>
        </div>
        <div class="nav-mobile js-nav-mobile-toggle">
            <a class="nav-mobile__toggle" href="#"><span class="nav-mobile__content"></span></a>
        </div>
        <div class="nav__menu">
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
                            <div class="nav__item nav__item--sub"><a class="nav__link" href="/admin/rubrics">Рубрики</a></div>
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
        </div>
    </nav>
</div>
