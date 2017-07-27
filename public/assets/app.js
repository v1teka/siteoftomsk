$(document).ready(function() {
    $('.js-spoiler-link').click(function(e) {
        var content = $(this).next('.js-spoiler-content').first();
        content.slideToggle(500);
        return false;
    });
});

// Навигация
$(document).ready(function() {
    $('.js-nav-dropdown-link').click(function(e) {
        $(this).siblings('.js-nav-dropdown-content').slideToggle();
        e.stopPropagation();
    });

    $('html').click(function() {
        $('.js-nav-dropdown-content').slideUp();
    });

    $('.js-nav-mobile-toggle').on('click', function() {
        $(this).find('.nav-mobile__content').toggleClass('nav-mobile__content--active');
    });

    $('.js-nav-mobile-toggle').click(function() {
        $('.nav__menu').toggle();
    });
});
