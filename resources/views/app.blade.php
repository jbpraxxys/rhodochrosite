<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="base" content="{{ url('/') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        @routes

        <!-- Styles & Scripts -->
        @vite(['resources/scss/admin.scss', 'resources/ts/admin.ts'])
    </head>
    <body class="font-sans antialiased">
        @inertia

        @env ('local')
            <!-- <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script> -->
        @endenv
    </body>
</html>
