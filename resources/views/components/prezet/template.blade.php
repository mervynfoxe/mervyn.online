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
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            <x-prezet.alpine>
                <x-prezet.header />
                <div
                    class="relative mx-auto flex w-full max-w-8xl flex-auto justify-center sm:px-2 lg:px-8 xl:px-12 bg-white dark:bg-slate-700"
                >
                    {{-- Left Sidebar --}}
                    @if (isset($left))
                        {{ $left }}
                    @endif

                    {{-- Main Content --}}
                    <main
                        class="max-w-2xl min-w-0 flex-auto px-4 py-16 lg:max-w-none lg:pr-0 lg:pl-8 xl:px-16"
                    >
                        {{ $slot }}
                    </main>

                    {{-- Right Sidebar --}}
                    @if (isset($right))
                        {{ $right }}
                    @endif
                </div>
            </x-prezet.alpine>
        </div>
    </body>
</html>
