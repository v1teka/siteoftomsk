<div class="fotorama" data-autoplay="true">
    <?php $i = 1;?>
    @while (file_exists(public_path() . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'slider' . DIRECTORY_SEPARATOR . $i . '.jpg'))
        <div class="slider-item" data-img="/assets/slider/{!! $i !!}.jpg">
            @include ('pages.includes.slider_text')
        </div>
        <?php $i++; ?>
    @endwhile
    <!--<a href="https://youtu.be/Q8CUYhxJFrw?rel=0&amp;controls=0&amp;showinfo=0&amp;modestbranding=1">
        <img src="https://i.ytimg.com/vi/5f9TEzIaeLQ/maxresdefault.jpg" />
    </a>-->
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
