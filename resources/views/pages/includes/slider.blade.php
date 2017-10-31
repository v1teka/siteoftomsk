<div class="fotorama">
    <div class="slider-item" data-img="https://pp.userapi.com/c627231/v627231559/2c8f8/fVt8BKPEZjY.jpg">
        <div class="container">
            <div class="title title--xxl slider-item__title">Добро пожаловать в Томск 7.0</div>
            <div class="slider-item__content">
                <!--<p>Технологии и творчество</p>-->
                <p class="slider_info">Уважаемые посетители!</p>
                <p class="slider_small">На нашем портале вы можете получить информацию и выразить свое мнение по вопросам,</p>
                <p class="slider_small">связанным с формированием комфортной и безопасной городской среды</p>
                <div class="slider_questioning_container">
                    <div class="slider_questioning_left_div">
                        <a class="slider_questioning_left_a" target="_blank" href="https://goo.gl/forms/YwgnGCsbY2nunFAq2" class="questioning-link">Пройти анкетирование</a>
                    </div>
                    <div class="slider_questioning_right_div">
                        <a class="slider_questioning_right_a" href="{{ route('forum.index') }}">Город равных возможностей</a>
                    </div>
                    <div class="clear-both"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item slider-item--center" data-img="https://pp.userapi.com/c627231/v627231559/2c901/kpbqrMikGYo.jpg">
        <div class="container">
            <div class="title title--xxl slider-item__title">Томск 7.0</div>
            <div class="slider-item__content">
                <!--<p>Технологии и творчество</p>-->
                <!--<a target="_blank" href="https://goo.gl/forms/YwgnGCsbY2nunFAq2" class="questioning-link">Пройти анкетирование</a>-->
            </div>
        </div>
    </div>
    <a href="https://youtu.be/Q8CUYhxJFrw?rel=0&amp;controls=0&amp;showinfo=0&amp;modestbranding=1">
        <img src="https://i.ytimg.com/vi/5f9TEzIaeLQ/maxresdefault.jpg" />
    </a>
</div>
@push('head')
    <!-- fotorama.css -->
    <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
@endpush
@push('scripts')
    <!-- fotorama.js. -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
    <script>
        $(function () {
            $('.fotorama').fotorama({
                width: '100%',
                maxheight: 650,
                ratio: '16/9',
                fit: 'cover',
                loop: true,
                nav: false,
                click: false,
            });
        });
    </script>
@endpush
