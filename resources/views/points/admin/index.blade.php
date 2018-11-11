@extends('dashboard.index')

@section('title', 'Список точек на карте')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div>
                <a href="#" >Скопления точек</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Категория</th>
                            <th>Количество точек</th>
                            <th>Дата создания</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $key=>$group)
                            <tr>
                                <td><a href="{{route('points.admin.group', $key)}}"><i class="fa fa-{{$group->type_icon}} text-black" style="font-size: 1.7em;"></i></a></td>
                                <td>{{ $group->count }}</td>
                                <td>{{ $group->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="container-fluid">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Карта</th>
                            <th>Автор</th>
                            <th>Проект</th>
                            <th>Дата создания</th>
                            <th>Модерация</th>
                            <th>Удалить</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($points as $point)
                            @if ($point->moderated === null)
                                <tr>
                            @elseif ($point->moderated == 1)
                                <tr class="success">
                            @else
                                <tr class="danger">
                            @endif
                                <td>{{ $point->id }}</td>
                                <td><a class="link" href="{{ route('points.edit', $point) }}">{{ $point->title }}</a></td>
                                <td>
                                    <?php print ($point->type->isPositive == 1)? "Позитива":"Проблем"; ?>
                                </td>
                                <td><a class="link" href="{{ route('users.admin.show', $point->user) }}">{{ $point->user->full_name }}</a></td>
                                <td>
                                    @if ($point->project === null)
                                        Нет
                                    @else
                                        <a class="link" href="{{route('projects.admin.show', $point->project)}}">{{$point->project->title}}</a>
                                    @endif
                                </td>
                                <td>{{ $point->created_at->format('d.m.Y H:i:s') }}</td>
                                <td>
                                    @if ($point->moderated === null)
                                        Рассматривается
                                    @elseif ($point->moderated == 1)
                                        Одобрен
                                    @else
                                        Отклонён
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('points.destroy', $point) }}" title="Удалить точку" class="confirm">
                                        <i class="fa fa-close text-red icon-big"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('points.admin.create') }}" class="btn btn-success">Добавить точку</a>
                {{ $points->links('layouts.pagination') }}
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    window.onload = function() {
        $('.confirm').bind('click', (function(e) {
            var currentLink = this;
            e.preventDefault();
            bootbox.confirm({
                message: "Вы действительно хотите удалить точку?",
                buttons: {
                    confirm: {
                        label: 'Да, удалить',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'Нет',
                        className: 'btn-success'
                    }
                },
                callback: function (result) {
                    if (result) {
                        document.location.href = currentLink.href;
                    }
                }
            })
        }));
    };
</script>
@endpush
