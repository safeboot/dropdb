<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title -->
        <title>{{ config('app.name', 'DropDB') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sometype+Mono:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/25f7ef40e8.js" crossorigin="anonymous"></script>

        <!-- Cloudflare Turnstile -->
        @turnstileScripts()

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
        @spladeHead

    </head>

    <body class="font-sans antialiased bg-[#242424] !mb-0">

        @splade

        @if(date('m') == '01' || date('m') == '12')

            <!-- Snow! -->
            <div id="snow" class="fixed inset-0 z-0 pointer-events-none"></div>

        @endif

    </body>

</html>
