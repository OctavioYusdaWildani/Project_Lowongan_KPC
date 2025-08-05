<x-app-layout>
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                <h2 class="text-3xl font-bold mb-2">Progress Rekrutmen</h2>
                <p class="text-gray-600 mb-10">Lacak perjalanan rekrutmen Anda step by step</p>

                @php
                    $steps = [
                        'melamar' => ['title' => 'Apply Lowongan', 'desc' => 'Pengajuan aplikasi dan berkas', 'icon' => '📄'],
                        'psikotest' => ['title' => 'Online Psychotest', 'desc' => 'Tes psikologi dan kemampuan', 'icon' => '🧠'],
                        'hr_interview' => ['title' => 'HR Interview', 'desc' => 'Wawancara dengan HR', 'icon' => '🧍'],
                        'user_interview' => ['title' => 'User Interview', 'desc' => 'Wawancara dengan user', 'icon' => '💼'],
                    ];
                    $statusList = array_keys($steps);
                    $currentStatus = $lamaran->status ?? null;
                    $currentIndex = array_search($currentStatus, $statusList);
                @endphp

                <div class="grid grid-cols-4 gap-4 mb-8">
                    @foreach ($steps as $key => $step)
                        @php
                            $index = array_search($key, $statusList);
                            $isPassed = $currentStatus === 'selesai' || $index < $currentIndex;
                            $isCurrent = $currentStatus !== 'selesai' && $index == $currentIndex;

                            $color = $currentStatus === 'selesai' || $isPassed || $isCurrent ? 'bg-green-500 text-white' : 'bg-gray-300 text-white';
                            $opacity = $currentStatus !== 'selesai' && $index > $currentIndex ? 'opacity-40' : '';
                            
                            $statusLabel = $currentStatus === 'selesai'
                                ? 'Selesai'
                                : ($isCurrent ? 'Sedang Berlangsung' : ($isPassed ? 'Selesai' : 'Belum Dimulai'));                                                    $statusColor = $isCurrent ? 'text-green-600' : ($isPassed ? 'text-gray-600' : 'text-gray-500');
                        @endphp

                        <div class="bg-white rounded-xl shadow p-4 {{ $opacity }}">
                            <div class="w-10 h-10 mx-auto mb-2 {{ $color }} rounded-full flex items-center justify-center text-lg">
                                {{ $step['icon'] }}
                            </div>
                            <h3 class="font-bold">{{ $step['title'] }}</h3>
                            <p class="text-sm text-gray-500">{{ $step['desc'] }}</p>
                            <span class="font-semibold text-sm {{ $statusColor }}">{{ $statusLabel }}</span>
                        </div>
                    @endforeach
                </div>

                @if ($currentStatus === 'ditolak')
                    <div class="bg-red-100 p-4 rounded-lg text-left">
                        <p class="font-bold text-red-700">Status Lamaran: Ditolak</p>
                        <p class="text-sm text-gray-700">
                            Maaf, lamaran Anda tidak lolos ke tahap selanjutnya. Terima kasih telah melamar.
                        </p>
                    </div>
                @elseif ($currentStatus && isset($steps[$currentStatus]))
                    <div class="bg-blue-100 p-4 rounded-lg text-left">
                        <p class="font-bold">Tahap Saat Ini: {{ $steps[$currentStatus]['title'] }}</p>
                        <p class="text-sm text-gray-700">
                            @switch($currentStatus)
                                @case('melamar')
                                    Lamaran Anda telah diterima. Kami akan meninjau dokumen Anda segera.
                                    @break
                                @case('psikotest')
                                    Silakan mengikuti psikotes yang telah dikirim ke email Anda.
                                    @break
                                @case('hr_interview')
                                    Anda telah mengikuti psikotes. Tim HR akan menghubungi Anda untuk jadwal wawancara.
                                    @break
                                @case('user_interview')
                                    Anda akan menjalani wawancara tahap akhir bersama user terkait posisi ini.
                                    @break
                            @endswitch
                        </p>
                    </div>
                @endif

                @if ($currentStatus === 'selesai')
                    <div class="bg-green-100 p-6 rounded-lg text-left">
                        <h3 class="text-2xl font-bold text-green-700">🎉 Selamat!</h3>
                        <p class="text-gray-800 mt-2">
                            Anda telah menyelesaikan seluruh proses rekrutmen. Terima kasih telah mengikuti setiap tahapannya.
                        </p>
                        <p class="text-sm text-gray-600 mt-2">
                            Kami akan segera menghubungi Anda untuk informasi lebih lanjut terkait hasil akhir rekrutmen.
                        </p>
                    </div>
                @endif


            </div>
        </div>
    </div>
</x-app-layout>
