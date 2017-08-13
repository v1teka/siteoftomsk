@can('delete', $rubric)
    <h2 class="title title--xl">Удаление рубрики</h2>
    <form method="POST" action="{{ route('rubrics.destroy', $rubric) }}" enctype="multipart/form-data">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <div class="form-group">
            <button class="button button--warning" type="submit">Удалить</button>
        </div>
    </form>
@endcan
