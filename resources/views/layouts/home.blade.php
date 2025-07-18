<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="auth" content="{{ auth()->check() ? auth()->id() : '' }}">
        <meta name="is-admin" content="false">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="app-host" content="{{ config('app.url', '') }}">

        <title>{{ auth()->check() ? env('APP_SECOND_NAME') : config('app.name', 'TRANSPORT POUR TOUS') }}</title>
        <x-icon></x-icon>
        
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset(ispublicpath() .'css/all.home.min.css') }}">
        <link rel="stylesheet" href="{{ asset(ispublicpath() .'css/slick.home.css') }}">
        <link rel="stylesheet" href="{{ asset(ispublicpath() .'css/bootstrap.home.min.css') }}">
        <link rel="stylesheet" href="{{ asset(ispublicpath() .'css/style.home.css') }}">
        <link rel="stylesheet" href="{{ asset(ispublicpath() .'css/media-query.home.css') }}">
        @stack('links')
        <script src="{{ asset(ispublicpath() .'js/axios.min.js') }}"></script>
    </head>
    <body>
	    <div class="site-content">
            <!-- <x-preloader></x-preloader> -->

            <x-top-header></x-top-header>

            <div id="page-content">
                {{ $slot }}
            </div>

            <x-bottom-nav></x-bottom-nav>
            <x-sidebar-menu></x-sidebar-menu>
        </div>

        <script src="{{ asset(ispublicpath() .'js/jquery.home.min.js') }}"></script>
        <script src="{{ asset(ispublicpath() .'js/slick.home.min.js') }}"></script>
        <script src="{{ asset(ispublicpath() .'js/bootstrap.bundle.home.min.js') }}"></script>
        @stack('scripts')
    </body>
</html>
