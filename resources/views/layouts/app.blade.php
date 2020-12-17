<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }} - Video Games Database</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.css') }}">

        @livewireStyles

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>
    <body class="bg-gray-900 text-white">

        <header class="border-b border-gray-800">
            <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
                <div class="flex flex-col lg:flex-row items-center">
                    <a href="{{ url('/') }}" class="font-black uppercase tracking-widest">{{ config('app.name') }}</a>

                    <ul class="flex ml-0 lg:ml-10 space-x-8 mt-6 lg:mt-0">
                        <li><a href="{{ url('/') }}" class="hover:text-gray-400">Games</a></li>
                        <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                        <li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
                    </ul>
                </div>

                <div class="flex items-center mt-6 lg:mt-0">
                    <livewire:search-dropdown>
                    <div class="ml-6">
                        <a href="#"><img src="{{ asset('images/sample-avatar.png') }}" alt="Avatar" class="rounded-full w-8"></a>
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-8">
            @yield('content')
        </main>

        <footer class="border-t border-gray-800">
            <div class="container mx-auto px-4 py-6">
                <div class="flex space-x-5 text-sm">
                    <span>Powered by <a href="https://www.igdb.com/discover" target="_blank" class="underline hover:text-gray-400">IGDB</a></span>
                    <span><a href="https://github.com/pedroroccon/gamefy" target="_blank" class="underline hover:text-gray-400"><i class="fab fa-github fa-fw mr-2"></i>Github</a></span>
                    <span>Developed by <a href="mailto:pedro@pedroroccon.com.br" class="underline hover:text-gray-400">Pedro Roccon</a></span>
                    <span>Icons by Font Awesome and Freepik</span>
                </div>
            </div>
        </footer>

        @livewireScripts
        <script src="{{ asset('js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
