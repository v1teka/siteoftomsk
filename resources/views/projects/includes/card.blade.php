<a href="{{ route('projects.show', $project) }}" class="row__col row__col_size_4 project-card project-card_link">
    <div class="project-card__image" style="background: url('http://via.placeholder.com/350x250') 100% 100% no-repeat; background-size: cover;"></div>
    <div class="project-card__content">
        <div class="project-card__title">{{ $project->title }}</div>
        <div class="project-card__text">{{ $project->description }}</div>
    </div>
</a>
