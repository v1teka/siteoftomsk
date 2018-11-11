<h2 class="title title--xl">Удаление точки с карты</h2>
<form method="POST" action="{{ route('points.destroy', $point) }}" enctype="multipart/form-data">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <div class="form-group">
        <button class="button button--warning" type="submit">Удалить</button>
    </div>
</form>
