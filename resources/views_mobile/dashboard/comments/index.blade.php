@extends('dashboard.index')

@push('scripts')
<script type="text/javascript" src="{{ asset('/js/adminComments.js') }}"></script>
@endpush

@section('title', 'Список комментариев')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container-fluid">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Проект</th>
                            <th>Текст комментария</th>
                            <th>Автор</th>
                            <th>Обработан</th>
                            <th>Показать</th>
                            <th>Дата создания</th>
                            <th>Дата модификации</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            @if ($comment->project == null)
                                @continue
                            @endif
                            <tr>
                                <td>{!! $comment->id !!}</td>
                                <td><a href="{!! route('projects.show', $comment->project_id) !!}">{!! $comment->project->title !!}</a></td>
                                <td>
                                    <textarea class="form-control" type="text" name="message" id="message_{!! $comment->id !!}" placeholder="Комментарий">{!! $comment->message !!}</textarea>
                                    <button
                                            class="btn btn-success btn-comment-change"
                                            type="button"
                                            data-id="{!! $comment->id !!}"
                                            data-href="{{ route('comment.admin.update.ajax') }}"
                                            data-token="{{csrf_token()}}">Изменить комментарий</button>
                                </td>
                                <td><a href="{!! route('users.admin.show', $comment->created_by) !!}">{!! $comment->createdBy->name !!}</a></td>
                                <td>
                                    <input
                                            class="checkbox-is-processed"
                                            type="checkbox"
                                            name="is_processed"
                                            data-id="{!! $comment->id !!}"
                                            data-token="{{csrf_token()}}"
                                            data-href="{{ route('comment.process.admin.update.ajax') }}"
                                            {{ $comment->is_processed ? 'checked="checked"' : '' }}>
                                </td>
                                <td>
                                    <input
                                            class="checkbox-is-published"
                                            type="checkbox"
                                            name="is_published"
                                            data-id="{!! $comment->id !!}"
                                            data-token="{{csrf_token()}}"
                                            data-href="{{ route('comment.publish.admin.update.ajax') }}"
                                            {{ $comment->is_published ? 'checked="checked"' : '' }}>
                                </td>
                                <td>{!! $comment->created_at !!}</td>
                                <td>{!! $comment->updated_at !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $comments->links('layouts.pagination') }}
            </div>
        </div>
    </div>

@endsection
