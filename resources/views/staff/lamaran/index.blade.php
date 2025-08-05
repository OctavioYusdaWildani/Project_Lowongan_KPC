<x-app-layout>
<div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 mt-16">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-white">Daftar Lamaran Masuk</h1>
        </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg mx-auto max-w-7xl mt-20">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lowongan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telepon</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($lamarans as $lamaran)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $lamaran->nama_lengkap }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $lamaran->ptk->jabatan }}-{{ $lamaran->ptk->unit }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $lamaran->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $lamaran->telepon }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusClass = match($lamaran->status) {
                                    'melamar' => 'text-gray-600',
                                    'psikotest' => 'text-blue-600',
                                    'hr_interview' => 'text-amber-600',
                                    'user_interview' => 'text-purple-600',
                                    'selesai' => 'text-emerald-700',
                                    default => 'text-red-600',
                                };
                                $statusText = match($lamaran->status) {
                                'melamar' => 'Lamaran Masuk',
                                'psikotest' => 'Psikotes',
                                'hr_interview' => 'Interview HR',
                                'user_interview' => 'Interview User',
                                'selesai' => 'Selesai',
                                default => 'Ditolak',
                            };
                            @endphp

                            <span class="px-2 py-1 rounded text-sm font-semibold {{ $statusClass }}">
                                {{ $statusText }}
                            </span>

                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('lamaran.show', $lamaran->id) }}" class="text-teal-600 hover:text-teal-800 hover:underline">Detail</a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Belum ada lamaran.</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
