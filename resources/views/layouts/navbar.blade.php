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
                    <a class="LinkNameSiteText" href="/"> ТОМСК 7.0. Технологии и творчество</a>
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
    </table>
</div>
<div class="overlay"></div>

<div class="BigMenu panel-group" id="ML">
    <ul class="MenuList panel panel-default">
        <a class="MenuListExitToOne" href="{{ route('pages.index') }}">
            <li>
                Главная страница
            </li>
        </a>
        <hr class="HRLine"/>

        <a href="{{ route('points.index', 1) }}">
            <li class="MenuListExitToALL">
                Карта позитива
            </li>
        </a>

        <a href="{{ route('points.index', 2) }}">
            <li class="MenuListExitToALL">
                Карта негатива
            </li>
        </a>

        <hr class="HRLine"/>

        <a data-toggle="collapse" href="#MT">
            <li class="MenuListExitToALL">
                Исследование и аналитика
            </li>
        </a>

        <ul class="MenuListTwo panel-collapse collapse panel-body" id="MT">
            <a href="{{ route('projects.show', 3) }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Здоровый образ жизни
                    </p>
                </li>
            </a>
            <a href="{{ route('projects.show', 4) }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Гармония с природой
                    </p>
                </li>
            </a>
            <a href="{{ route('projects.show', 5) }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Мир без барьеров (интересы ЛСОП)
                    </p>
                </li>
            </a>
            <a href="{{ route('projects.show', 6) }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        «Процветающее общество»
                    </p>
                </li>
            </a>
            <hr class="HRLine"/>
        </ul>


        <a href="{{ route('smart.index') }}">
            <li class="MenuListExitToALL">
                Smart-решения для города
            </li>
        </a>

        <a href="{{ route('projects.show', 7) }}">
            <li class="MenuListExitToALL">
                UniverCITerra
            </li>
        </a>

        <a data-toggle="collapse" href="#R70">
            <li class="MenuListExitToALL">
                70 Регион
            </li>
        </a>
        <ul class="MenuListTwo panel-collapse collapse panel-body" id="R70">
            <a href="{{ route('projects.show', 14) }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Удобная территория
                    </p>
                </li>
            </a>
            <a href="{{ route('projects.show', 15) }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Экологичное пространство
                    </p>
                </li>
            </a>
            <a href="{{ route('projects.show', 16) }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Комфортная среда
                    </p>
                </li>
            </a>
            <hr class="HRLine"/>
        </ul>

        <a data-toggle="collapse" href="#HName">
            <li class="MenuListExitToALL">
                Счастливое имя
            </li>
        </a>
        <ul class="MenuListTwo panel-collapse collapse panel-body" id="HName">
            <a href="{{ route('projects.show', 17) }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Нумерологический паспорт города
                    </p>
                </li>
            </a>
            <a href="{{ route('projects.show', 18) }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Кейсы
                    </p>
                </li>
            </a>
            <hr class="HRLine"/>
        </ul>

        <a data-toggle="collapse" href="#Famali">
            <li class="MenuListExitToALL">
                СемьЯ
            </li>
        </a>
        <ul class="MenuListTwo panel-collapse collapse panel-body" id="Famali">
            <a href="{{ route('rubrics.show', 'studenty') }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Студенты
                    </p>
                </li>
            </a>
            <a href="{{ route('rubrics.show', 'odinokie') }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Одинокие
                    </p>
                </li>
            </a>
            <a href="{{ route('rubrics.show', 'pozhilye') }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Пожилые
                    </p>
                </li>
            </a>
            <a href="{{ route('rubrics.show', 'migranty') }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Мигранты
                    </p>
                </li>
            </a>
            <a href="{{ route('rubrics.show', 'lsop') }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        ЛСОП
                    </p>
                </li>
            </a>
            <a href="{{ route('rubrics.show', 'mamy-s-malenkimi-detmi') }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Мамы с маленькими детьми
                    </p>
                </li>
            </a>
            <a href="{{ route('rubrics.show', 'semi-s-raznovozrastnymi-detmi') }}">
                <li class="MenuListExitToALLTwo">
                    <p>
                        Семьи с разновозрастными детьми
                    </p>
                </li>
            </a>
        </ul>

        <hr class="HRLine"/>
        
        <a href="{{ route('projects.show', 26) }}">
            <li class="MenuListExitToALL">
                Новости
            </li>
        </a>

        <a href="{{ route('projects.show', 8) }}">
            <li class="MenuListExitToALL">
                О проекте
            </li>
        </a>
        <hr class="HRLine"/>
        <a href="{{ route('projects.show', 13) }}">
            <li class="MenuListExitToALL">
                Контакты
            </li>
        </a>
        <br />
    </ul>

    <div class="BigMenuExit">
        &times;
    </div>
</div>