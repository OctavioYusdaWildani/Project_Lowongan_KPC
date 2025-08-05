<x-app-layout>
<div class="py-6 ">
        <div class="mb-6 max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <h1 class="text-4xl font-bold text-white text-center">Lowongan Kerja Terbaru</h1>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-40">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if($lowongans->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($lowongans as $lowongan)
                            <div class="bg-white border rounded shadow hover:shadow-md transition duration-200">
                                    @if($lowongan->image)
                                    <img src="{{ asset('storage/' . $lowongan->image) }}"
                                        alt="{{ $lowongan->jabatan }}" class="w-full h-48 object-cover rounded-t">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded-t">
                                        <span class="text-gray-500">Tidak ada gambar</span>
                                    </div>
                                @endif
                            
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold">
                                        <a href="{{ route('lowongan.show', $lowongan->id) }}" class="hover:underline text-gray-800">
                                            {{ $lowongan->jabatan }}
                                        </a>
                                    </h3>
                                    <p class="text-gray-600 text-sm">{{ $lowongan->unit }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-gray-600">Tidak ada lowongan yang tersedia saat ini.</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>    