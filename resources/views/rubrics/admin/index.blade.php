@extends('layouts.app')

@section('title', 'Список рубрик')

@section('content')
    @parent
    <div class="page">
        <div class="page__content">
            <div class="container">
                <h1 class="title title--xxl">Список рубрик</h1>
                <table class="table">
                    <thead class="table__head">
                        <tr class="table__row">
                            <td class="table__column">№</td>
                            <td class="table__column">Название</td>
                            <td class="table__column">Описание</td>
                            <td class="table__column">Количество проектов</td>
                        </tr>
                    </thead>
                    <tbody class="table__body">
                        @foreach ($rubrics as $rubric)
                            <tr class="table__row">
                                <td class="table__column">{{ $rubric->id }}</td>
                                <td class="table__column"><a class="link" href="{{ route('rubrics.show', $rubric) }}">{{ $rubric->name }}</td>
                                <td class="table__column">{{ $rubric->description }}</td>
                                <td class="table__column">{{ $rubric->projects->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $rubrics->links('layouts.pagination') }}
            </div>
        </div>
    </div>
@endsection
