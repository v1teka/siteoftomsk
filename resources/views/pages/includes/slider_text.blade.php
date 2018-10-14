<div class="container">
    <div class="title title--xxl slider-item__title">ДОБРО ПОЖАЛОВАТЬ В ТОМСК</div>
    <div class="slider-item__content">
        <p class="slider_info">Уважаемые посетители!</p>
        <p class="slider_small">На нашем портале вы можете получить информацию и выразить свое мнение по вопросам,</p>
        <p class="slider_small">связанным с формированием комфортной и безопасной городской среды</p>
        <!--<p class="slider_info"></p>
        <p class="slider_small"></p>
        <p class="slider_small"></p>-->
        <div class="slider_questioning_container">
            <div class="slider_questioning_left_div">
                <a class="slider_questioning_left_a" target="_blank" href="{!! $questionnaire->value or 'https://goo.gl/forms/YwgnGCsbY2nunFAq2' !!}" class="questioning-link">Пройти анкетирование</a>
            </div>
            <div class="slider_questioning_right_div">
                <a class="slider_questioning_right_a" href="{{ route('forum.index') }}">Город равных возможностей</a>
            </div>
            <div class="clear-both"></div>
        </div>
    </div>
</div>