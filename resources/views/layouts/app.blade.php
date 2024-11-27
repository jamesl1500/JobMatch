<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title><?php echo $title; ?> - {{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/styles.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div class="website">
            <div class="header-hold">
                @include('templates.header')
            </div>
            <div class="website-hold">
                @if($section)
                    <section class="website-page-title">
                        <div class="container">
                            <h1><?php echo $title; ?></h1>
                        </div>
                    </section>
                @endif
                <div class="banner-hold">
                    @yield('banner')
                </div>
                <div class="page-navigation-hold">
                    @yield('page-navigation')
                </div>
                <section class="website-content container">
                    @yield('content')
                </section>
            </div>
            <div class="footer-hold">
                @include('templates.footer')
            </div>
        </div>

        <script src="{{ asset('js/scripts.js') }}" type="text/javascript"></script>
    </body>
</html>
