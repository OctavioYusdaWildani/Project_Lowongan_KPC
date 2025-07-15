<x-app-layout>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg text-center">
                <h3 class="text-2xl font-bold text-red-600 mb-4">Akses Ditolak</h3>
                <p class="text-gray-700 mb-6">
                    Anda belum memenuhi syarat untuk mengikuti psikotest. Silakan ajukan psikotest melalui halaman lamaran terlebih dahulu.
                </p>
                <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
