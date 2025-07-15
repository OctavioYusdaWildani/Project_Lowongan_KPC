<x-app-layout>
<div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-white">Manajemen Akun Psikotest</h1>
        </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" x-data="{ open: false }">

            <div class="mb-4">
                <button @click="open = true" class="bg-[#00205B] text-white px-4 py-2 rounded inline-block">
                    + Tambah Akun Psikotest
                </button>
            </div>

            {{-- Modal --}}
            <div x-show="open" class="fixed inset-0 z-50 bg-gray-900 bg-opacity-50 flex items-center justify-center">
                <div @click.away="open = false" class="bg-white w-full max-w-3xl rounded-lg shadow-lg p-6 relative overflow-y-auto max-h-[90vh]">
                    <button @click="open = false" class="absolute top-2 right-3 text-gray-600 hover:text-gray-900 text-xl">&times;</button>

                    <h2 class="text-2xl font-bold mb-4">Buat Akun Psikotest</h2>

                    <form action="{{ route('manage.psikotest.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="font-semibold">Nama <span class="text-red-600">*</span></label>
                                <input type="text" name="nama" class="w-full border rounded p-2" required>
                            </div>

                            <div>
                                <label class="font-semibold">Email <span class="text-red-600">*</span></label>
                                <input type="email" name="email" class="w-full border rounded p-2" required>
                            </div>
                    
                            <div>
                                <label class="font-semibold">Password <span class="text-red-600">*</span></label>
                                <input type="password" name="password" class="w-full border rounded p-2" required>
                            </div>

                            <div>
                                <label class="font-semibold">Jadwal Mulai Psikotest <span class="text-red-600">*</span></label>
                                <input type="datetime-local" name="jadwal" class="w-full border rounded p-2" required>
                            </div>
                            
                    
                        </div>
                    
                        <div class="mt-6 text-right">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                                Simpan Akun
                            </button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
        
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jadwal pengerjaan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">hasil</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($akunList as $akun)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $akun->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $akun->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $akun->jadwal}}</td>
                            <td class="px-6 py-4 whitespace-pre-wrap text-sm text-gray-600">
                                @if ($akun->psikotest)
                                    {{ json_encode($akun->psikotest->answers, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}
                                @else
                                    Tidak tersedia
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-gray-500">Belum ada akun psikotest.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>