<form method="POST" action="{{ route('forum.messages.delete', $message) }}">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <div class="form-group">
        <button class="button button--s button--link" type="submit">Удалить</button>
    </div>
</form>
