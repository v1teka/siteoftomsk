$(document).ready(function() {
    $('.js-spoiler-link').click(function(e) {
        var content = $(this).next('.js-spoiler-content').first();
        content.slideToggle(500);
        return false;
    });
});
