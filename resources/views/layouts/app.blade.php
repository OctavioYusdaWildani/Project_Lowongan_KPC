<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased relative">
    <div class="fixed top-0 left-0 w-full h-full -z-10 bg-cover bg-center"
         style="background-image: url('{{ asset('background.png') }}');">
    </div>

    {{-- Seluruh konten halaman --}}
    <div class="flex flex-col min-h-screen">
        @auth
            @switch(Auth::user()->role)
                @case('guest')
                    @include('guest.navbar')
                    @break

                @case('staff')
                @case('department_manager')
                @case('director')
                @case('hr_manager')
                    @include('staff.navbar')
                    @break

                @default
                    @include('layouts.navigation')
            @endswitch
        @endauth

        {{-- Optional header --}}
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- Konten halaman --}}
        <main class="pt-24 flex-grow">
            {{ $slot }}
        </main>
    </div>

<!-- Footer -->
    <footer class="bg-white bg-opacity-90 text-center text-gray-600 py-4 shadow-inner">
    <div class="max-w-7xl mx-auto px-4">
        <p class="text-sm">&copy; {{ date('Y') }} PT Kansai Prakarsa Coatings. All rights reserved.</p>
    </div>
</footer>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>    
</body>

</html>
