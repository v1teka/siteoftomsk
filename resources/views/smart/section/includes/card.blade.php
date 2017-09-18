<div class="smart-section-container">
    <div class="smart-img-container">
        <img class="smart-img-title" src="{{ Storage::disk('public')->url($smartSection->img_path) }}" />
    </div>
    <div class="smart-title-container">
        <div class="smart-title">
            <span class="smart-title-span">{{ $smartSection->title }}</span>
        </div>
    </div>
    @foreach($smartSection->solutions as $smartSolution)
        @include('smart.solution.includes.card')
    @endforeach
</div>