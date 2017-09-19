$(document).ready(function() {
    var rating = $('.js-rating');
    //var user_rating = rating.data('user-rating');
    showAvgRatingsStars();

    rating.find('.js-rating-star').click(function() {
        var score = $(this).data('score');
        var currating = $(this).parents('.js-rating');
        var rateable = currating.data('rateable');
        var avg_rating = currating.data('avg-rating');
        var request = $.ajax({
            url: '/smart/' + rateable + '/rate',
            method: 'POST',
            data: { 'score': score },
        });
        request.done(function(rating_callback) {
            avg_rating = rating_callback;
            currating.find('.js-avg-rating').text(avg_rating);
            showRatingStars(currating, avg_rating);
            user_rating = score;
            currating.find('.js-user-rating').text('Ваша оценка: ' + user_rating);
        });
        request.fail(function(error) {
            showRatingStars(currating, avg_rating);
        });
    });

    rating.find('.js-rating-star').on('mouseover', function(e) {
        var score = $(this).data('score');
        showRatingStars($(this).parents('.js-rating'), score);
    });

    rating.on('mouseout', function() {
        showRatingStars($(this), $(this).data('avg-rating'));
    });
});

function showAvgRatingsStars() {
    var solutionsRatings = $('.js-rating');
    solutionsRatings.each(function(index, solution) {
        solution = $(solution);
        var score = solution.data('avg-rating');
        var stars = solution.find('.js-rating-star');
        showRatingStars(solution, score);
    });
}

function showRatingStars(object, score) {
    var stars = $(object).find('.js-rating-star');
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