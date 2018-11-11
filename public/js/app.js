$(document).ready(function() { // Ждём загрузки страницы
    window.onscroll = function() {
        $('#app-nav-header-name').removeClass('app-nav-header-name');
        if (window.pageYOffset == 0) {
            $('#app-nav-header-name, #nav-login, #nav-register, #nav-username, #nav-logout').removeClass('app-nav-header-name-smallfont');
            $('#app-nav-header-name, #nav-login, #nav-register, #nav-username, #nav-logout').addClass('app-nav-header-name-largefont');
        } else {
            $('#app-nav-header-name, #nav-login, #nav-register, #nav-username, #nav-logout').removeClass('app-nav-header-name-largefont');
            $('#app-nav-header-name, #nav-login, #nav-register, #nav-username, #nav-logout').addClass('app-nav-header-name-smallfont');
        }
    }
});
