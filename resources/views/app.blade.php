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
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead

        <style>
            :root {
                --primary: #cba365;
                --secondary: #0a192f;
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
                z-index: 100; /* Ensure Inertia is always on top */
            }

            /* Absolute 'Nuclear' Isolation for Admin & Auth Routes */
            @if(request()->is('admin*') || request()->is('login') || request()->is('register'))
                /* Force hide EVERYTHING that isn't the app root or its contents */
                body > *:not(#app):not(script):not(style) {
                    display: none !important;
                    visibility: hidden !important;
                    opacity: 0 !important;
                    pointer-events: none !important;
                    position: fixed !important;
                    z-index: -9999 !important;
                }

                html, body {
                    height: 100% !important;
                    overflow: hidden !important;
                }
                #app {
                    height: 100% !important;
                }
                
                /* Specific known leakers from Blade */
                #main-nav, .hero-wrapper, .video-container, footer, .scan-overlay {
                    display: none !important;
                    visibility: hidden !important;
                }
            @endif
        </style>
        <script>
            /**
             * The 'Nuclear Janitor' - Real-time DOM Cleaner
             * Strictly for Login, Register, and Admin routes.
             */
            @if(request()->is('admin*') || request()->is('login') || request()->is('register'))
                (function() {
                    const cleanDOM = () => {
                        const appRoot = document.getElementById('app');
                        if (!appRoot) return;

                        // Identify elements that shouldn't exist outside #app
                        const leakers = document.querySelectorAll('header, footer, nav, section, .hero-wrapper, .video-container, .scan-overlay, #main-nav');
                        leakers.forEach(el => {
                            if (!appRoot.contains(el)) {
                                console.log('[Nuclear Janitor] Terminated rogue element:', el.tagName, el.className);
                                el.remove();
                            }
                        });
                    };

                    // Initial clean
                    document.addEventListener('DOMContentLoaded', cleanDOM);
                    
                    // Real-time Mutation Observer to kill rogue elements as they spawn
                    const observer = new MutationObserver((mutations) => {
                        cleanDOM();
                    });

                    observer.observe(document.body, { childList: true, subtree: false });
                    
                    // Backup clean after a small delay (to catch late renders)
                    setTimeout(cleanDOM, 500);
                    setTimeout(cleanDOM, 2000);
                })();
            @endif
        </script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
