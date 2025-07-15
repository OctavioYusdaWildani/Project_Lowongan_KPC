<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pengajuan PTK') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded p-6">
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5 text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('ptk.update', $ptk->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label>Unit</label>
                        <select name="unit" class="w-full border p-2 rounded" required>
                            <option value="Cat" {{ $ptk->unit == 'Cat' ? 'selected' : '' }}>Cat</option>
                            <option value="Resin" {{ $ptk->unit == 'Resin' ? 'selected' : '' }}>Resin</option>
                        </select>
                    </div>

                    <div>
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" class="w-full border p-2 rounded"
                            value="{{ old('jabatan', $ptk->jabatan) }}" required>
                    </div>

                    <div>
                        <label>Tanggal Permintaan</label>
                        <input type="date" name="tanggal_permintaan" class="w-full border p-2 rounded"
                            value="{{ old('tanggal_permintaan', $ptk->tanggal_permintaan) }}" required>
                    </div>

                    <div>
                        <label>Jumlah Tenaga Kerja</label>
                        <input type="text" name="Jumlah_tenaga_kerja" class="w-full border p-2 rounded"
                            value="{{ old('Jumlah_tenaga_kerja', $ptk->Jumlah_tenaga_kerja) }}" required>
                    </div>

                    <div>
                        <label>Jumlah Permintaan</label>
                        <input type="text" name="jumlah_permintaan" class="w-full border p-2 rounded"
                            value="{{ old('jumlah_permintaan', $ptk->jumlah_permintaan) }}" required>
                    </div>

                    <div>
                        <label>Departemen</label>
                        <input type="text" name="departemen" class="w-full border p-2 rounded"
                            value="{{ old('departemen', $ptk->departemen) }}" required>
                    </div>

                    <div>
                        <label>Status Karyawan</label>
                        <select name="status_karyawan" class="w-full border p-2 rounded" required>
                            <option value="bulanan" {{ $ptk->status_karyawan == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                            <option value="harian" {{ $ptk->status_karyawan == 'harian' ? 'selected' : '' }}>Harian</option>
                            <option value="kontrak" {{ $ptk->status_karyawan == 'kontrak' ? 'selected' : '' }}>Kontrak</option>
                        </select>
                    </div>

                    <div>
                        <label>Pendidikan</label>
                        <input type="text" name="pendidikan" class="w-full border p-2 rounded"
                            value="{{ old('pendidikan', $ptk->pendidikan) }}" required>
                    </div>

                    <div>
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                            <option value="Laki-laki" {{ $ptk->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $ptk->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label>Usia</label>
                        <input type="text" name="usia" class="w-full border p-2 rounded"
                            value="{{ old('usia', $ptk->usia) }}" required>
                    </div>

                    <div>
                        <label>Pengalaman</label>
                        <input type="text" name="pengalaman" class="w-full border p-2 rounded"
                            value="{{ old('pengalaman', $ptk->pengalaman) }}" required>
                    </div>

                    <div>
                        <label>Bahasa Asing</label>
                        <input type="text" name="bahasa_asing" class="w-full border p-2 rounded"
                            value="{{ old('bahasa_asing', $ptk->bahasa_asing) }}" required>
                    </div>

                    <div>
                        <label>Keahlian Khusus</label>
                        <input type="text" name="keahlian_khusus" class="w-full border p-2 rounded"
                            value="{{ old('keahlian_khusus', $ptk->keahlian_khusus) }}" required>
                    </div>

                    <div>
                        <label>Tes Buta Warna</label>
                        <select name="Tes_buta_warna" class="w-full border p-2 rounded" required>
                            <option value="perlu" {{ $ptk->Tes_buta_warna == 'perlu' ? 'selected' : '' }}>Perlu</option>
                            <option value="tidak_perlu" {{ $ptk->Tes_buta_warna == 'tidak_perlu' ? 'selected' : '' }}>Tidak Perlu</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label>Uraian Singkat</label>
                        <textarea name="uraian_singkat" class="w-full border p-2 rounded"
                            rows="3" required>{{ old('uraian_singkat', $ptk->uraian_singkat) }}</textarea>
                    </div>

                    <div>
                        <label>Struktur Organisasi</label>
                        <input type="file" name="struktur_organisasi" class="w-full border p-2 rounded">

                        @if($ptk->struktur_organisasi)
                            <p class="mt-2 text-sm text-gray-600">Gambar lama:</p>
                            <img src="{{ asset('storage/' . $ptk->struktur_organisasi) }}"
                                alt="Struktur Organisasi" class="w-64 h-auto mt-2 rounded shadow">
                        @endif
                    </div>

                    <div>
                        <label>Upload Gambar Workspace</label>
                        <input type="file" name="image" class="w-full border p-2 rounded">

                        @if($ptk->image)
                            <p class="mt-2 text-sm text-gray-600">Gambar lama:</p>
                            <img src="{{ asset('storage/' . $ptk->image) }}"
                                alt="Gambar Pendukung" class="w-64 h-auto mt-2 rounded shadow">
                        @endif
                    </div>

                    <div>
                        <label>Permintaan</label>
                        <select name="permintaan" class="w-full border p-2 rounded" required>
                            <option value="penggantian" {{ $ptk->permintaan == 'penggantian' ? 'selected' : '' }}>Penggantian</option>
                            <option value="penambahan" {{ $ptk->permintaan == 'penambahan' ? 'selected' : '' }}>Penambahan</option>
                        </select>
                    </div>

                    <div>
                        <label>Alasan (Opsional)</label>
                        <input type="text" name="alasan" class="w-full border p-2 rounded"
                            value="{{ old('alasan', $ptk->alasan) }}">
                    </div>
                </div>

                <div class="mt-6">
                    <x-primary-button>Simpan Perubahan</x-primary-button>
                    <a href="{{ route('ptk.show', $ptk->id) }}"
                       class="ml-4 inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
