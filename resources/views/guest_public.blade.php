<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Karir - Kansai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    {{-- NAVBAR UNTUK PUBLIC --}}
    <nav class="fixed top-0 w-full z-50 bg-white shadow py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <div class="flex items-center">
                {{-- Logo --}}
                <a href="/" class="flex items-center">
                    <img src="{{ asset('Logo_Kansai.png') }}" alt="Logo Kansai" class="h-10 w-auto">
                </a>
            </div>

            <div class="hidden md:flex space-x-6">
                <a href="#lowongan" class="text-gray-800 hover:text-blue-700 font-medium">Lowongan</a>
                <a href="#about" class="text-gray-800 hover:text-blue-700 font-medium">About</a>
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Login / Register
                </a>
            </div>
        </div>
    </nav>

    <div class="pt-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- SECTION LOWONGAN --}}
        <section id="lowongan" class="mb-16">
            <h2 class="text-3xl font-semibold mb-6 text-gray-800">Daftar Lowongan</h2>
            @forelse ($lowongans as $lowongan)
                <div class="bg-white shadow rounded p-6 mb-6">
                    <h3 class="text-xl font-bold text-blue-700">{{ $lowongan->jabatan }}</h3>
                    <p class="text-gray-600">{{ $lowongan->departemen }} - {{ $lowongan->unit }}</p>
                    <p class="text-gray-600"><strong>Usia:</strong> {{ $lowongan->usia }} | <strong>Pendidikan:</strong> {{ $lowongan->pendidikan }}</p>
                </div>
            @empty
                <p class="text-gray-600">Belum ada lowongan tersedia saat ini.</p>
            @endforelse
        </section>

        {{-- SECTION ABOUT --}}
        <section id="about" class="bg-white shadow rounded p-6">
            <h2 class="text-3xl font-semibold mb-4 text-gray-800">Tentang Kami</h2>
            <p class="text-gray-700 leading-relaxed">
                PT. Kansai Prakarsa Coatings adalah perusahaan manufaktur cat terkemuka yang mengkhususkan diri dalam solusi pelapisan inovatif. Kami berkomitmen terhadap kualitas dan keberlanjutan, melayani berbagai sektor termasuk otomotif, industri, dan bangunan. Dengan tim yang berdedikasi dan teknologi mutakhir, kami terus mendorong batasan dalam industri cat.
            </p>
        </section>

    </div>

    {{-- FOOTER --}}
    <footer class="mt-16 bg-gray-800 text-white text-center py-4">
        &copy; 2025 PT. Kansai Prakarsa Coatings. All rights reserved.
    </footer>

</body>
</html>
    