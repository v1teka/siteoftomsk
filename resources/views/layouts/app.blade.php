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

    {{-- CSRF-Token
    ___________________________________________________ --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Шрифты
    –––––––––––––––––––––––––––––––––––––––––––––––––– --}}
    <link href="//fonts.googleapis.com/css?family=Fira+Sans:200,400,500" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i&amp;subset=cyrillic" rel="stylesheet">

    {{-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– --}}
    @stack('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/fontello/css/fontello.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/sass/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/NameSite.css" />
    <link rel="stylesheet" type="text/css" href="/css/additionalStyles.css" />
    @stack('css')
    <link rel="stylesheet" type="text/css" href="/css/ProLink.css" />

    {{-- Скрипты
    –––––––––––––––––––––––––––––––––––––––––––––––––– --}}
    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/NameSite.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/ZoomNamePage.js') }}" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::render() !!}
    @stack('scripts')
    <script type="text/javascript" src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('/assets/app.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('/js/ProLink.js') }}"></script>
  </head>

  <body class="body">
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
