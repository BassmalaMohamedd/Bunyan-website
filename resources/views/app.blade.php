<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js'])
        @inertiaHead

        <style>
            :root {
                --primary: #f59e0b;
                --secondary: #1c1917;
            }
            html, body {
                background-color: var(--secondary) !important;
                color: #fff;
                margin: 0;
                padding: 0;
            }
            #app {
                min-height: 100vh;
                background-color: var(--secondary);
                position: relative;
                z-index: 100;
            }
        </style>
    </head>
    <body class="font-sans antialiased" style="background-color: #1c1917;">
        @inertia
    </body>
</html>
