@if($paginator->hasPages())
    <div class="section pagination">
        <div class="container pagination__container">
            {{-- Ссылка на предыдущую страницу --}}
            @if($paginator->onFirstPage())
                <a class="link pagination__link pagination__link-disabled">&larr;</a>
            @else
                <a class="link pagination__link" href="{{ $paginator->previousPageUrl() }}">&larr;</a>
            @endif

            @foreach($elements as $element)
                {{-- Разделитель с тремя точками --}}
                @if(is_string($element))
                    <a class="link pagination__link pagination__link-disabled">{{ $element }}</a>
                @endif
                {{-- Массив ссылок --}}
                @if (is_array($element))
                    @foreach($element as $page => $url)
                        @if($page == $paginator->currentPage())
                            <a class="link pagination__link pagination__link-active">{{ $page }}</a>
                        @else
                            <a class="link pagination__link" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Ссылка на следующую страницу --}}
            @if($paginator->hasMorePages())
                <a class="link pagination__link" href="{{ $paginator->nextPageUrl() }}">&rarr;</a>
            @else
                <a class="link pagination__link pagination__link-disabled">&rarr;</a>
            @endif
        </div>
    </div>
@endif
