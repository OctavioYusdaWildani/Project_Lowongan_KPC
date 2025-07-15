<x-app-layout>

    <div class="max-w-7xl mx-auto py-8">
        <div class="bg-white shadow rounded-lg p-6">
            <table class="table-auto w-full border-2 border-black text-left mb-6">
                <tbody>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Nama Lengkap</th>
                        <td class="border-2 border-black px-4 py-2">{{ $lamaran->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Email</th>
                        <td class="border-2 border-black px-4 py-2">{{ $lamaran->email }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Telepon</th>
                        <td class="border-2 border-black px-4 py-2">{{ $lamaran->telepon }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Jenis Kelamin</th>
                        <td class="border-2 border-black px-4 py-2">{{ ucfirst($lamaran->jenis_kelamin) }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Usia</th>
                        <td class="border-2 border-black px-4 py-2">{{ $lamaran->usia }} tahun</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Pendidikan</th>
                        <td class="border-2 border-black px-4 py-2">{{ $lamaran->pendidikan }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Lowongan</th>
                        <td class="border-2 border-black px-4 py-2">{{ $lamaran->ptk->jabatan }}-{{ $lamaran->ptk->unit }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Pengalaman</th>
                        <td class="border-2 border-black px-4 py-2">{{ $lamaran->pengalaman }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Bahasa Asing</th>
                        <td class="border-2 border-black px-4 py-2">{{ $lamaran->bahasa_asing }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Keahlian Khusus</th>
                        <td class="border-2 border-black px-4 py-2">{{ $lamaran->keahlian_khusus }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">CV</th>
                        <td class="border-2 border-black px-4 py-2">
                            @if($lamaran->cv_path)
                                <a href="{{ asset('storage/' . $lamaran->cv_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat CV</a>
                            @else
                                <span class="text-gray-400">Tidak tersedia</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Status Lamaran</th>
                        <td class="border-2 border-black px-4 py-2 capitalize">
                            {{ $lamaran->status ?? 'melamar' }}
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="mb-4">
                <p class="text-gray-800 font-semibold mb-1">Gambar Pendukung</p>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    @forelse($lamaran->images ?? [] as $image)
                        <a href="{{ asset('storage/' . $image) }}" target="_blank">
                            <img src="{{ asset('storage/' . $image) }}" alt="Gambar" class="rounded shadow border">
                        </a>
                    @empty
                        <p class="text-gray-400">Tidak ada gambar</p>
                    @endforelse
                </div>
            </div>

            <div class="mt-6 flex gap-4">
                <!-- Lanjut ke proses berikut -->
                <form action="{{ route('lamaran.approve', $lamaran->id) }}" method="POST">
                    @csrf
                    <button class="bg-[#00205B;] text-white font-bold py-2 px-4 rounded"
                        onclick="return confirm('Lanjutkan ke proses selanjutnya?')">
                        Continue Next Process
                    </button>
                </form>

                <!-- Tolak lamaran -->
                <form action="{{ route('lamaran.reject', $lamaran->id) }}" method="POST">
                    @csrf
                    <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                        onclick="return confirm('Yakin menolak lamaran ini?')">
                        Reject
                    </button>
                </form>
            </div>


            <form action="{{ route('lamaran.index') }}" method="GET">
                <button type="submit" class="bg-gray-200 text-gray-800 px-6 py-2 rounded hover:bg-gray-300">
                    ← Kembali ke daftar lamaran
                </button>
            </form>
        </div>
    </div>
</x-app-layout>