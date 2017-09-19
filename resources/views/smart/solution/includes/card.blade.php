<div class="solution-container">
    <ul class="solution-ul">
        <li class="solution-li">
            <span class="solution">{{ $smartSolution->description }}</span>
        </li>
    </ul>
    <div class="project-rating smart-rating-container">
        <div class="rating js-rating" data-rateable="{{ $smartSolution->id }}" data-avg-rating="{{ $smartSolution->avg_rating }}" data-user-rating="{{ Auth::check() ? Auth::user()->rating($smartSolution) : null }}">
            <span class="rating__stars">
                @for ($i = 1; $i <= 5; $i++)
                    <span class="rating__star icon icon--star-empty js-rating-star" data-score="{{ $i }}"></span>
                @endfor
            </span>
            <span class="rating__avg-value">
                <span class="js-avg-rating" data-rateable="{{ $smartSolution->id }}">{{ $smartSolution->avg_rating > 0 ? $smartSolution->avg_rating : 'Нет оценок' }}</span>
            </span>
            @if (Auth::check())
                <div class="rating__user-value">
                    <span class="js-user-rating" data-rateable="{{ $smartSolution->id }}">{{ Auth::user()->rating($smartSolution) != null ? 'Ваша оценка: ' . Auth::user()->rating($smartSolution) : ''  }}</span>
                </div>
            @else
                <div class="rating__user-value" data-rateable="{{ $smartSolution->id }}">
                    <a class="link link--dark" href="{{ route('login') }}">Войдите</a>, чтобы оценить.
                </div>
            @endif
        </div>
    </div>
</div>