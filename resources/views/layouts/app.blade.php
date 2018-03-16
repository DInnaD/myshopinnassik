<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSS -->
    <link rel="stylesheet" href="public/megamenu/css/style.css">
    <link href="{{ asset('public/css/front.css') }}" rel="stylesheet">
</head>
<body>
@include('pages.header')
@include('pages.menu')
@yield('content')
@yield('footer')
<script src="{{ asset('public/js/front.js') }}"></script>
<script src="{{ asset('public/js/main.js') }}"></script>
</body>

</html>