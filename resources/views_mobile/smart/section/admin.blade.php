@extends('dashboard.index')

@section('title', 'Список разделов Smart-решений')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container-fluid">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Изображение</th>
                        </tr>
                    </thead>
                    <tbody class="table__body">
                        @foreach ($smartSections as $smartSection)
                            <tr>
                                <td>{{ $smartSection->id }}</td>
                                <td><a href="{{ route('smart.sections.edit.admin.index', $smartSection) }}">{{ $smartSection->title }}</a></td>
                                <td><img src="{{ Storage::disk('public')->url($smartSection->img_path) }}" /></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('smart.sections.create.admin.index') }}" class="btn btn-success">Добавить раздел Smart-решения</a>
            </div>
        </div>
    </div>
@endsection
