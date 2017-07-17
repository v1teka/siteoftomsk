<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    {{-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– --}}
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="author" content="">

    {{-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Шрифты
    –––––––––––––––––––––––––––––––––––––––––––––––––– --}}
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic" rel="stylesheet">

    {{-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– --}}
    <link rel="stylesheet" href="{{ asset('/assets/app.css') }}">
    @stack('head')
  </head>

  <body>
    {{-- Верхнее меню
    –––––––––––––––––––––––––––––––––––––––––––––––––– --}}
    @include('layouts.navbar')

    {{-- Контент из дочерних шаблонов
    –––––––––––––––––––––––––––––––––––––––––––––––––– --}}

    @yield('content')
    {{-- Подвал
    –––––––––––––––––––––––––––––––––––––––––––––––––– --}}
    @include('layouts.footer')
  </body>

  {{-- Скрипты
  –––––––––––––––––––––––––––––––––––––––––––––––––– --}}
  <script src="{{ asset('/assets/app.js') }}" type="text/javascript"></script>
  @stack('scripts')
</html>
