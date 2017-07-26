$(document).ready(function() {
    $('.js-spoiler-link').click(function(e) {
        var link = $(this);
        var content = $(this).next('.js-spoiler-content').first();
        if (content.hasClass('js-spoiler-content-showed')) {
            content.slideUp(500);
            content.removeClass('js-spoiler-content-showed');
            link.html('Показать');
        }
        else {
            content.slideDown(500);
            content.addClass('js-spoiler-content-showed');
            link.html('Скрыть');
        }
        return false;
    });
});
