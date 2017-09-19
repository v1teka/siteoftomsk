$(document).ready(function() {
    var rating = $('.js-rating');
    var rateable = rating.data('rateable');
    var user_rating = rating.data('user-rating');
    var avg_rating = rating.data('avg-rating');
    showRatingStars(avg_rating);

    rating.find('.js-rating-star').click(function() {
        var score = $(this).data('score');
        var request = $.ajax({
            url: '/smart/' + rateable + '/rate',
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
        request.fail(function(error) {
            showRatingStars(avg_rating);
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