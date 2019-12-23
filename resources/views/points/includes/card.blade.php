<a href="{{ route('projects.show', $project) }}">
    <div class="DivOut">
        <img class="ImgPL" src="{{ asset(Storage::disk('public')->url($project->image)) }}">
        <div class="DivIn">
            <h1>{{ $project->title }}</h1>
            <h3>{{ $project->description }}</h3>
        </div>
    </div>
</a>
