<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://cdn.jsdelivr.net" />
        <x-prezet.meta />

        <!-- Scripts -->
        @vite([
          'resources/css/prezet.css',
          'resources/js/blog.js',
          'resources/js/fixes.js',
          ])
        @stack('jsonld')

        <script>
            ;(function () {
                const stored = localStorage.getItem('theme')
                const prefersDark = window.matchMedia(
                    '(prefers-color-scheme: dark)'
                ).matches
                const useDark =
                    stored === 'dark' || (stored === null && prefersDark)

                if (useDark) {
                    document.documentElement.classList.add('dark')
                }
            })()
        </script>
    </head>
    <body class="font-sans antialiased dark:bg-zinc-900">
        <div class="min-h-screen">
            <x-prezet.header />
            <div class="container m-auto">
                {{ $slot }}
            </div>
            <x-prezet.footer />
        </div>
    </body>
</html>
