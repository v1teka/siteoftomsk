<div class="comment-container">
    <div class="comment-name">{!! \App\User::findOrFail($comment->created_by)->name !!},&nbsp;</div>
    <div class="comment-usertype">{!! isset(\App\User::findOrFail($comment->created_by)->roles->first()->name) ? \App\User::findOrFail($comment->created_by)->roles->first()->name : 'Пользователь' !!}</div>
    <div class="comment-datetime">{!! $comment->created_at !!}</div>
    <div class="comment-message">{!! $comment->message !!}</div>

    @if ($comment->comments()->get()->count() > 0)
        @foreach($comment->comments()->get() as $curcomment)
            @include ('projects.includes.comment', ['comment' => $curcomment])
        @endforeach
    @endif
</div>
