<x-app-layout>

    @if(session('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition
            class="fixed top-6 left-1/2 transform -translate-x-1/2 bg-green-50 border border-green-400 text-green-800 px-6 py-4 rounded-lg shadow-md flex items-center gap-3 z-50"
        >
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
            <span class="font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- Detail PTK -->
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded p-6">
            <table class="table-auto w-full border-2 border-black text-left">
                <tbody>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Unit</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->unit }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Jabatan</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->jabatan }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Departemen</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->departemen }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Tanggal Permintaan</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->tanggal_permintaan }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Jumlah Tenaga Kerja</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->Jumlah_tenaga_kerja }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Status Karyawan</th>
                        <td class="border-2 border-black px-4 py-2">{{ ucfirst($ptk->status_karyawan) }}</td>
                    </tr>
                    <tr>
                        <th colspan="2" class="border-2 border-black px-4 py-2 bg-gray-100 text-lg font-semibold">Kualifikasi</th>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Pendidikan</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->pendidikan }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Jenis Kelamin</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Usia</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->usia }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Pengalaman</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->pengalaman }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Bahasa Asing</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->bahasa_asing }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Keahlian Khusus</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->keahlian_khusus }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Tes Buta Warna</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->Tes_buta_warna }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Uraian Singkat</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->uraian_singkat }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2 align-top">Struktur Organisasi</th>
                        <td class="border-2 border-black px-4 py-2">
                            <div class="border rounded p-2 max-w-full overflow-auto">
                                <img src="{{ asset('storage/' . $ptk->struktur_organisasi) }}"
                                    alt="Struktur Organisasi"
                                    class="zoomable rounded shadow max-w-[400px] max-h-[300px] object-contain mx-auto">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Permintaan</th>
                        <td class="border-2 border-black px-4 py-2">{{ ucfirst($ptk->permintaan) }}</td>
                    </tr>
                    <tr>
                        <th class="border-2 border-black px-4 py-2">Alasan</th>
                        <td class="border-2 border-black px-4 py-2">{{ $ptk->alasan ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mb-6 mt-4">
                <p class="text-gray-800 font-semibold mb-1">Gambar Workspace</p>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    <div class="border rounded p-2 max-w-full overflow-auto">
                        <img src="{{ asset('storage/' . $ptk->image) }}" 
                            alt="Gambar PTK"
                            class="zoomable rounded shadow max-w-[400px] max-h-[300px] object-contain mx-auto">
                    </div>
                </div>
            </div>
            
            <!-- Status Persetujuan -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold mb-2">Status Persetujuan</h3>
                <ul class="list-disc list-inside space-y-1">
                    <li>
                        <strong>Manager:</strong>
                        @if($ptk->status_manager === 'pending')
                            <span class="text-yellow-600">Menunggu persetujuan</span>
                        @elseif($ptk->status_manager === 'approved')
                            <span class="text-green-600">Disetujui</span>
                        @elseif($ptk->status_manager === 'rejected')
                            <span class="text-red-600">Ditolak</span> <br>
                            <em>Alasan: {{ $ptk->reject_reason_manager }}</em>
                        @endif
                    </li>
                    <li>
                        <strong>Director:</strong>
                        @if($ptk->status_director === 'pending')
                            <span class="text-yellow-600">Menunggu persetujuan</span>
                        @elseif($ptk->status_director === 'approved')
                            <span class="text-green-600">Disetujui</span>
                        @elseif($ptk->status_director === 'rejected')
                            <span class="text-red-600">Ditolak</span> <br>
                            <em>Alasan: {{ $ptk->reject_reason_director }}</em>
                        @endif
                    </li>
                    <li>
                        <strong>HR Manager:</strong>
                        @if($ptk->status_hr === 'pending')
                            <span class="text-yellow-600">Menunggu persetujuan</span>
                        @elseif($ptk->status_hr === 'approved')
                            <span class="text-green-600">Disetujui</span>
                        @elseif($ptk->status_hr === 'rejected')
                            <span class="text-red-600">Ditolak</span> <br>
                            <em>Alasan: {{ $ptk->reject_reason_hr }}</em>
                        @endif
                    </li>
                </ul>
            </div>

            @php
                $user = Auth::user();
                $canApproveReject = false;
                $roleKey = '';

                if ($user->role === 'department_manager' && $ptk->status_manager === 'pending') {
                    $canApproveReject = true;
                    $roleKey = 'manager';
                } elseif ($user->role === 'director' && $ptk->status_manager === 'approved' && $ptk->status_director === 'pending') {
                    $canApproveReject = true;
                    $roleKey = 'director';
                } elseif ($user->role === 'hr_manager' && $ptk->status_director === 'approved' && $ptk->status_hr === 'pending') {
                    $canApproveReject = true;
                    $roleKey = 'hr';
                }
            @endphp

            <!-- Tombol Persetujuan -->
            @if($canApproveReject)
                <div class="mt-6">
                    <form action="{{ route('ptk.approve', $ptk->id) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-[#00205B;] text-white px-4 py-2 rounded hover:bg-green-700">
                            Approve
                        </button>
                    </form>

                    <button onclick="document.getElementById('rejectModal').classList.remove('hidden')"
                            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 ml-2">
                        Reject
                    </button>
                </div>
            @endif
            
            <!-- Tombol Edit dan Resubmit -->
            @if(Auth::user()->role === 'staff' &&
                ($ptk->status_manager === 'rejected' || $ptk->status_director === 'rejected' || $ptk->status_hr === 'rejected'))

                <div class="mt-6">
                    <a href="{{ route('ptk.edit', $ptk->id) }}"
                    class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                        ✏️ Edit PTK
                    </a>

                    <form action="{{ route('ptk.resubmit', $ptk->id) }}" method="POST" class="inline ml-2">
                        @csrf
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
                                onclick="return confirm('Ajukan ulang PTK ini? Semua status persetujuan akan direset.')">
                            🔄 Ajukan Ulang
                        </button>
                    </form>
                </div>
            @endif

            <form action="{{ route('ptk.index') }}" method="GET" class="mt-4">
                <button type="submit" class="bg-gray-200 text-gray-800 px-6 py-2 rounded hover:bg-gray-300">
                    ← Kembali ke daftar PTK
                </button>
            </form>
        </div>
    </div>

    <!-- Modal Alasan Reject -->
    <div id="rejectModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ $errors->any() ? '' : 'hidden' }}">
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 relative">
            <button onclick="document.getElementById('rejectModal').classList.add('hidden')"
                    class="absolute top-2 right-3 text-gray-600 hover:text-gray-900 text-xl">&times;
            </button>
            <h3 class="text-lg font-semibold mb-4">Masukkan Alasan Penolakan</h3>

            {{-- ✳️ Error message --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ptk.reject', $ptk->id) }}" method="POST">
                @csrf
                <input type="hidden" name="role_key" value="{{ $roleKey }}">
                <textarea name="reject_reason" class="w-full border rounded p-2" rows="4" required>{{ old('reason') }}</textarea>
                <div class="mt-4 text-right">
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                        Submit Penolakan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
