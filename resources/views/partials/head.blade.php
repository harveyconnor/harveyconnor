<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<!--[if IE 9]><html class="ie9 no-focus" lang="en"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-focus" lang="en"><!--<![endif]-->
<head>
    <meta name="description" content="Harvey Connor">
    <meta name="author" content="Harvey Connor">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="shortcut icon" href="assets/img/favicons/favicon.png">
    <!-- CSRF Token -->
    <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') - {{ config('app.name', 'Laravel') }}</title>

    @yield('extra_styles')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
