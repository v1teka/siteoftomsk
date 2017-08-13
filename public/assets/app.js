// CSRF токен для AJAX-запросов
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

// Спойлер
$(document).ready(function() {
    $('.js-spoiler-link').click(function(e) {
        e.preventDefault();
        var spoiler = $(this).closest('.js-spoiler');
        var content = spoiler.find('.js-spoiler-content').first();
        content.slideToggle(500);
        return false;
    });
});

// Навигация
$(document).ready(function() {
    $('.js-nav-dropdown-link').click(function(e) {
        e.preventDefault();
        $(this).siblings('.js-nav-dropdown-content').slideToggle();
        e.stopPropagation();
    });

    $('html').click(function() {
        $('.js-nav-dropdown-content').slideUp();
    });

    $('.js-nav-mobile-toggle').on('click', function(e) {
        e.preventDefault();
        $(this).find('.nav-mobile__content').toggleClass('nav-mobile__content--active');
    });

    $('.js-nav-mobile-toggle').click(function(e) {
        e.preventDefault();
        $('.nav__menu').toggle();
    });
});
