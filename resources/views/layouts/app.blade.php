<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="auth" content="{{ auth()->check() ? auth()->id() : '' }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="is-admin" content="true">
        <meta name="base_url" content="{{ config('app.url', '') }}">
        <meta name="app-url" content="{{ config('app.url', '') }}">
        <meta name="site-id" content="{{ env('CINETPAY_SITE_ID') }}">
        <meta name="api-key" content="{{ env('CINETPAY_API_KEY') }}">

        <title>{{ auth()->check() ? env('APP_SECOND_NAME') : config('app.name', 'TRANSPORT POUR TOUS') }}</title>
        <x-icon></x-icon>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">

        <link href="{{ asset(ispublicpath() .'css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset(ispublicpath() .'css/nifty.min.css') }}" rel="stylesheet">
        <link href="{{ asset(ispublicpath() .'css/demo/nifty-demo-icons.min.css') }}" rel="stylesheet">

        <link href="{{ asset(ispublicpath() .'plugins/pace/pace.min.css') }}" rel="stylesheet">
        <script src="{{ asset(ispublicpath() .'plugins/pace/pace.min.js') }}"></script>
        <link href="{{ asset(ispublicpath() .'css/demo/nifty-demo.min.css') }}" rel="stylesheet">
       
        @auth
            <link href="{{ asset(ispublicpath() .'css/treeview.css') }}" rel="stylesheet">
            <link href="{{ asset(ispublicpath() .'plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
            <link href="{{ asset(ispublicpath() .'plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet">
            <link href="{{ asset(ispublicpath() .'plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
            <link href="{{ asset(ispublicpath() .'plugins/animate-css/animate.min.css') }}" rel="stylesheet">
        @endauth
        
        <link href="{{ asset(ispublicpath() .'plugins/unitegallery/css/unitegallery.min.css') }}" rel="stylesheet">

        @guest
            <link href="{{ asset(ispublicpath() .'plugins/bootstrap-validator/bootstrapValidator.min.css') }}" rel="stylesheet">
            <link href="{{ asset(ispublicpath() .'plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
            <link href="{{ asset(ispublicpath() .'plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.css') }}" rel="stylesheet">
            <link href="{{ asset(ispublicpath() .'plugins/select2/css/select2.min.css') }}" rel="stylesheet">
        @endguest

        <link href="{{ asset(ispublicpath() .'plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
        @stack('links')
        <script src="{{ asset(ispublicpath() .'js/jquery.min.js') }}"></script>
        <script src="{{ asset(ispublicpath() .'js/bootstrap.min.js') }}"></script>      
        <script src="{{ asset(ispublicpath() .'js/demo/nifty-demo.min.js') }}"></script>
        <script src="{{ asset(ispublicpath() .'js/nifty.min.js') }}"></script>

        <script src="{{ asset(ispublicpath() .'js/axios.min.js') }}"></script>
    </head>
    <body>
        <div id="container" class="effect aside-float aside-bright {{ auth()->check() && !request()->routeIs('register.link') ? 'mainnav-lg' : 'mainnav-out slide' }}">
            <x-header-app></x-header-app>
            
            <div class="boxed">
                <div id="content-container">
                    <div id="page-head">
                        <div class="pad-all">
                            <h3 class="text-center text-uppercase">@lang('locale.welcome', ['suffix' => auth()->check() && !request()->routeIs('register.link') ? env('APP_SECOND_NAME') : config('app.name', 'TRANSPORT POUR TOUS')])</h3>
                            {{-- <p>Scroll down to see quick links and overviews of your Server, To do list, Order status or get some Help using Nifty.</p> --}}
                        </div>
                    </div>  
                    <div id="page-content">
                        {{ $slot }}
                    </div>
                </div>
                
                @auth
                    @if(!request()->routeIs('register.link'))
                    <x-nav-app></x-nav-app>
                    @endif
                @endauth
            </div>
        
            <x-footer-app></x-footer-app>
            <x-btn-scroll-app></x-btn-scroll-app>
        </div>     

        @stack('scripts')
        @auth
            @if(!request()->routeIs('register.link'))
                <script src="{{ asset(ispublicpath() .'plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
                <script src="{{ asset(ispublicpath() .'plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
                <script src="{{ asset(ispublicpath() .'plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
                <script src="{{ asset(ispublicpath() .'js/demo/tables-datatables.js') }}"></script>
                <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
            @endif
        @endauth
    </body>
</html>
