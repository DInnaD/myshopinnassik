<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('public/css/front.css') }}" rel="stylesheet">
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <script>$(document).ready(function(){$(".memenu").memenu();});</script>
</head>
<body>
@include('pages.header')
@include('pages.menu')
@yield('content')
@yield('footer')
<!-- Scripts -->
<script src="{{ asset('public/js/front.js') }}"></script>
<script src="{{ asset('public/js/main.js') }}"></script>
</body>
</html>
