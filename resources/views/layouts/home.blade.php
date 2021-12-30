<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/outside.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/icofont/icofont.min.css')}}">
    <link href="{{ asset('css/outside.css') }}" rel="stylesheet">

{{--    <link rel="stylesheet" href="{{asset('css/boxicons/css/boxicons.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/outside.css')}}">--}}
</head>

<body data-spy="scroll" data-target="navigation">
    <div id="app">
        @include('includes.home-nav')

        @yield('content')

        @include('includes.home-footer')
    </div>
</body>
</html>
