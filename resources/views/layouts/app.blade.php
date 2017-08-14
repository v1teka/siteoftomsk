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
    @stack('head')
    <link rel="stylesheet" href="{{ asset('/assets/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/NameSite.css" />
    @stack('css')

    {{-- Скрипты
    –––––––––––––––––––––––––––––––––––––––––––––––––– --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="/js/NameSite.js"></script>
    @stack('scripts')
    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
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

</html>
