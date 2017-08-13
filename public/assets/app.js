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

// Рейтинг
$(document).ready(function() {
    var rating = $('.js-rating');
    var rateable = rating.data('rateable');
    var user_rating = rating.data('user-rating');
    var avg_rating = rating.data('avg-rating');
    showRatingStars(avg_rating);

    rating.find('.js-rating-star').click(function() {
        var score = $(this).data('score');
        var request = $.ajax({
            url: '/projects/' + rateable + '/rate',
            method: 'POST',
            data: { 'score': score },
        });
        request.done(function(rating_callback) {
            avg_rating = rating_callback;
            rating.find('.js-avg-rating').text(avg_rating);
            showRatingStars(avg_rating);
            user_rating = score;
            rating.find('.js-user-rating').text('Ваша оценка: ' + user_rating);
        });
    });

    rating.find('.js-rating-star').on('mouseover', function(e) {
        var score = $(this).data('score');
        showRatingStars(score);
    });

    rating.on('mouseout', function() {
        showRatingStars(avg_rating);
    });
});

function showRatingStars(score) {
    var stars = $('.js-rating-star');
    stars.each(function(index, star) {
        star = $(star);
        if (star.data('score') <= score) {
            star.addClass('icon--star');
        }
        else {
            star.removeClass('icon--star');
        }
    });
}
