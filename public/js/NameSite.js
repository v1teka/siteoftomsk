// Переменная отвечает за скролл
var checkNameSite=0;
// Значения для баннера в максимальном режиме (начальные значения заданы в таблице стилей)
// 0 - высота баннера
// 1 - ширина колонки Рубрики
// 2 - Шрифт текст текста контейнера ссылок
// 3 - Шрифт заголовка сайта
// 4 - Ширина окна для ссылки на авторизацию
// 5 - Размер шрифта надписи логина в px (пискселях)
var MaxScale = [70, 110, 18, 24, 125, 18];
// Значения для баннера в минимальном режиме
var MinScale = [35, 55, 9, 12, 90, 12];
// Переменная в которой сохраняется значение смещения за экран для большого меню - которое выплывает
var LeftBigMenu;
// Мимнимальное значение ширины экрана браузера при котором отображается большой баннер
var PerMaxBanner = 730;

$(document).ready(function() { // Ждём загрузки страницы

// Восстановление медиа-запроса @media screen  and (max-width: 700px)
    var mql = window.matchMedia("(min-width: " + PerMaxBanner + "px)");
    function screenTest(e) {
        if (e.matches) {
            Mashtab (MaxScale);
        } else {
            Mashtab (MinScale);
        }
    }

    mql.addListener(screenTest);



//			ПЕРВОНАЧАЛЬНАЯ ИНИЦИАЛИЗАЦИЯ

//Сохранить координаты левого угла не видимого блока меню
    LeftBigMenu = $("div.BigMenu").offset().left;

// При нажатии на меню Рубрики - выдвигается большое меню с ссылками
    $("td.OneMenuText").click(function(){
        $("div.BigMenu").offset({top: $("div.ConteinerNameSite").offset().top});
        $("div.overlay").css("visibility", "visible");
        ShowBigMenu();
    });

// При нажатии в меню на крестик - большое меню закрывается
    $("div.BigMenuExit").click(function(){
        EndShowBigMenu();
        $("div.overlay").css("visibility", "hidden");
    });

    $("div.overlay").click(function(){
        EndShowBigMenu();
        $("div.overlay").css("visibility", "hidden");
    });

// Действие при наведении на пункт основго меню
    $("li.MenuListExitToALL").hover(
        function() { $(this).css({"width": $("ul.MenuList").width() + "px"});},
        function() {}
    );

// Дейсвтвие при наведении на горизонатльное меню
    $("td.MenuText2").hover(
        function() { },
        function() {$(this).children('ul').hide(300);}
    );

    // РЕАКЦИЯ НА СКРОЛИНГ ЭКРАНА - ВВЕРХ-ВНИЗ
    $(window).scroll(function() {
        ZoomBannerScroll ();
    });
});


function Mashtab(scale) {

    // Изменение высоты таблицы
    $("table.Link").css({
        height: scale[0] + "px",
    });

    // Изменение ширины контейнера с банером ссылок
    $("td.OneMenuText").css({
        width: scale[1] + "px"
    });

// Изменение ширины контейнера с логином
    $("td.RegCall").css({
        fontSize : scale[5] + "px",
        width: scale[4] + "px"
    });

// Изменение шрифта контейнера с сылками
    $("p.MenuText").css({
        fontSize: scale[2] + "pt",
        lineHeight: scale[0] + "px"
    });

// Изменение шрифта контейнера с названием сайта
    $("p.NameSiteText").css({
        fontSize: scale[3] + "pt",
        lineHeight: scale[0] + "px"
    });
}


// Плавное появление из-за экрана большого меню
function ShowBigMenu() {
    $("div.BigMenu").css({
        left: 0 + "px"
    });
}

// Плавное исчезновение за экраном большго меню
function EndShowBigMenu () {
    $("div.BigMenu").css({
        left: LeftBigMenu + "px"
    });
}

function ZoomBannerScroll () {

// Уменьшение баннера в 2 раза, если скрол пошел вниз и еще не уменьшено
    if ((checkNameSite == 0) && ($(window).scrollTop() > 0))
    {
        checkNameSite=1;
        Mashtab (MinScale);
    };

// Увеличение в 2 раза, если скрол дошел до верху и еще не увеличено
    if ((checkNameSite == 1) && ($(window).scrollTop() == 0))
    {
        checkNameSite=0;
        if(window.matchMedia("(min-width: " + PerMaxBanner + "px)").matches)
        {
            Mashtab (MaxScale);
        }
    };
}
