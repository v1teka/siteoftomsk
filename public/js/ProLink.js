var ElementTopOld;
var ElementTopNew;
var ElementColor;

$(document).ready(function() { // Ждём загрузки страницы

    // Действие при наведении на описние контейнера-ссылки
    $("div.DivIn").hover(
        function () {

            // Запоминаем цвет, который был
            ElementColor = $(this).css("color");
            // Запоминаем позицию блока (где он был)
            ElementTopOld = parseInt($(this).css("top"));
            // Рассчитываем новую позицию блока
            // высота блока DivOut минус высоту заголовка и высоту текста
            ElementTopNew = $("div.DivOut").height() - ($(this).children("h1").height() + $(this).children("h3").height()) * 1.13;

            // если текста мало (заголовок и тескт), то смещается на 5% от 60% блока DivOut
            if (ElementTopNew >= $("div.DivOut").height() * 0.6) {
                ElementTopNew = $("div.DivOut").height() * 0.6 * 0.95;
            }
            // если заголовок очень большой, то открываетя не более чем на все окно
            // остаток скрывается
            if (ElementTopNew < 0) {
                ElementTopNew = 0;
            }
            $(this).css({"color": "white", "top": ElementTopNew + "px"});
        },
        function() {
            $(this).css({"color": ElementColor, "top": "60%"});
        }
    );
});

