<x-app-layout>
<div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-white">Daftar Permintaan Tenaga Kerja</h1>
        </div>
        @if(session('success'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <div x-data="{ open: false }">
            <a href="{{ route('ptk.export.excel') }}" class="bg-[#61CE70] text-white px-4 py-2 rounded mb-4 ml-2 inline-block hover:bg-green-600">
                Export CSV
            </a>
            
            <!-- Tombol Trigger -->
            <button @click="open = true" class="bg-[#00205B] text-white px-4 py-2 rounded mb-4 inline-block">Ajukan PTK</button>

            <!-- Modal -->
            <div x-show="open" class="fixed inset-0 z-50 bg-gray-900 bg-opacity-50 flex items-center justify-center">
                <div @click.away="open = false" class="bg-white w-full max-w-6xl rounded-lg shadow-lg p-6 relative overflow-y-auto max-h-[90vh]">
                    <button @click="open = false" class="absolute top-2 right-3 text-gray-600 hover:text-gray-900 text-xl">&times;</button>
        
                    <h2 class="text-2xl font-bold mb-4">Form Pengajuan PTK</h2>
        
                    <form method="POST" action="{{ route('ptk.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>
                                <label>Unit</label>
                                <select name="unit" class="w-full border p-2 rounded" required>
                                    <option value="">Pilih</option>
                                    <option value="Cat" {{ old('unit') == 'Cat' ? 'selected' : '' }}>Cat</option>
                                    <option value="Resin" {{ old('unit') == 'Resin' ? 'selected' : '' }}>Resin</option>
                                </select>
                            </div>

                            <div>
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" class="w-full border p-2 rounded" required value="{{ old('jabatan') }}">
                            </div>

                            <div>
                                <label>Departemen</label>
                                <input type="text" name="departemen" class="w-full border p-2 rounded" required value="{{ old('departemen') }}">
                            </div>
                    
                            <div>
                                <label>Tanggal Permintaan</label>
                                <input type="date" name="tanggal_permintaan" class="w-full border p-2 rounded" required value="{{ old('tanggal_permintaan') }}">
                            </div>
                    
                            <div>
                                <label>Jumlah Tenaga Kerja</label>
                                <input type="text" name="Jumlah_tenaga_kerja" class="w-full border p-2 rounded" required value="{{ old('Jumlah_tenaga_kerja') }}">
                            </div>
                    
                            <div>
                                <label>Jumlah Permintaan</label>
                                <input type="text" name="jumlah_permintaan" class="w-full border p-2 rounded" required value="{{ old('jumlah_permintaan') }}">
                            </div>
                    
                            <div>
                                <label>Departemen</label>
                                <input type="text" name="departemen" class="w-full border p-2 rounded" required value="{{ old('departemen') }}">
                            </div>
                    
                            <div>
                                <label>Pendidikan</label>
                                <input type="text" name="pendidikan" class="w-full border p-2 rounded" required value="{{ old('pendidikan') }}">
                            </div>
                    
                            <div>
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                                    <option value="">Pilih</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                    
                            <div>
                                <label>Usia</label>
                                <input type="text" name="usia" class="w-full border p-2 rounded" required value="{{ old('usia') }}">
                            </div>
                    
                            <div>
                                <label>Status Karyawan</label>
                                <select name="status_karyawan" class="w-full border p-2 rounded" required>
                                    <option value="">Pilih Status</option>
                                    <option value="bulanan" {{ old('status_karyawan') == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                                    <option value="harian" {{ old('status_karyawan') == 'harian' ? 'selected' : '' }}>Harian</option>
                                    <option value="kontrak" {{ old('status_karyawan') == 'kontrak' ? 'selected' : '' }}>Kontrak</option>
                                </select>
                            </div>
                    
                            <div>
                                <label>Pengalaman</label>
                                <input type="text" name="pengalaman" class="w-full border p-2 rounded" required value="{{ old('pengalaman') }}">
                            </div>
                    
                            <div>
                                <label>Bahasa Asing</label>
                                <input type="text" name="bahasa_asing" class="w-full border p-2 rounded" required value="{{ old('bahasa_asing') }}">
                            </div>
                    
                            <div>
                                <label>Keahlian Khusus</label>
                                <input type="text" name="keahlian_khusus" class="w-full border p-2 rounded" required value="{{ old('keahlian_khusus') }}">
                            </div>
                    
                            <div>
                                <label>Tes Buta Warna</label>
                                <select name="Tes_buta_warna" class="w-full border p-2 rounded" required>
                                    <option value="">Pilih Status</option>
                                    <option value="perlu" {{ old('Tes_buta_warna') == 'perlu' ? 'selected' : '' }}>Perlu</option>
                                    <option value="tidak_perlu" {{ old('Tes_buta_warna') == 'tidak_perlu' ? 'selected' : '' }}>Tidak Perlu</option>
                                </select>
                            </div>

                            <div class="md:col-span-2">
                                <label>Uraian Singkat</label>
                                <textarea name="uraian_singkat" class="w-full border p-2 rounded" rows="3" required>{{ old('uraian_singkat') }}</textarea>
                            </div>
                    
                            <div>
                                <label>Struktur Organisasi</label>
                                <input type="file" name="struktur_organisasi" class="w-full border p-2 rounded">
                            </div>
                    
                            <div>
                                <label>Permintaan</label>
                                <select name="permintaan" class="w-full border p-2 rounded" required>
                                    <option value="">Pilih</option>
                                    <option value="penggantian" {{ old('permintaan') == 'penggantian' ? 'selected' : '' }}>Penggantian</option>
                                    <option value="penambahan" {{ old('permintaan') == 'penambahan' ? 'selected' : '' }}>Penambahan</option>
                                </select>
                            </div>
                    
                            <div>
                                <label>Alasan (Opsional)</label>
                                <input type="text" name="alasan" class="w-full border p-2 rounded" value="{{ old('alasan') }}">
                            </div>

                            <div>
                                <label>Upload Gambar Workspace</label>
                                <input type="file" name="image" class="w-full border p-2 rounded">
                            </div>
                        </div>
                    
                        <x-primary-button>
                            Ajukan PTK
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Tampilan Index -->
    <div class="bg-transparent shadow overflow-x-auto sm:rounded-lg mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mb-5">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departemen</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Permintaan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detail</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($ptks as $ptk)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ptk->unit }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ptk->jabatan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ptk->departemen }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ptk->jumlah_permintaan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ptk->permintaan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($ptk->tanggal_permintaan)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $status = $ptk->status_ptk;
                                    $color = [
                                        'pending' => 'text-yellow-600',
                                        'approved' => 'text-green-600',
                                        'published' => 'text-blue-600',
                                        'rejected' => 'text-red-600',
                                    ][$status] ?? 'text-gray-600';
                                @endphp

                                <span class="{{ $color }} font-semibold">{{ ucfirst($status) }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('ptk.show', $ptk->id) }}" class="text-blue-600 hover:underline">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Belum ada pengajuan PTK</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
