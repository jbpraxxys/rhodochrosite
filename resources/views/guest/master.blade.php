<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- AOS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"/>

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
        <link rel="stylesheet" href="{{ mix('assets/guest/app.css') }}">

    </head>
    <body id="body" class="font-sans antialiased scroll-main">

        @include('guest.partials.header')

        <div id="app" class="main-container">

            @yield('content')
            
        </div>

        @include('guest.partials.footer')

        <!-- jQuery -->
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        {{-- <script type="text/javascript">
            const $v2 = $.noConflict(true);
        </script> --}}
        <script src="others/jquery.mobile.custom.min.js"></script>

        <!-- AOS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        
    </body>
</html>
