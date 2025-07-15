<x-app-layout>
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                <h2 class="text-3xl font-bold mb-2">Progress Rekrutmen</h2>
                <p class="text-gray-600 mb-10">Lacak perjalanan rekrutmen Anda step by step</p>

                @php
                    $steps = [
                        'melamar' => ['title' => 'Apply Lowongan', 'desc' => 'Pengajuan aplikasi dan berkas', 'icon' => '📄'],
                        'diproses' => ['title' => 'Online Psychotest', 'desc' => 'Tes psikologi dan kemampuan', 'icon' => '🧠'],
                        'psikotest' => ['title' => 'HR Interview', 'desc' => 'Wawancara dengan HR', 'icon' => '🧍'],
                        'wawancara' => ['title' => 'User Interview', 'desc' => 'Wawancara dengan user', 'icon' => '💼'],
                    ];
                    $statusList = array_keys($steps);
                    $currentStatus = $lamaran->status ?? null;
                    $currentIndex = array_search($currentStatus, $statusList);
                @endphp

                <div class="grid grid-cols-4 gap-4 mb-8">
                    @foreach ($steps as $key => $step)
                        @php
                            $index = array_search($key, $statusList);
                            $isPassed = $index < $currentIndex;
                            $isCurrent = $index == $currentIndex;

                            $color = $isPassed || $isCurrent ? 'bg-green-500 text-white' : 'bg-gray-300 text-white';
                            $opacity = $index > $currentIndex ? 'opacity-40' : '';
                            
                            $statusLabel = $isCurrent ? 'Sedang Berlangsung' : ($isPassed ? 'Selesai' : 'Belum Dimulai');
                            $statusColor = $isCurrent ? 'text-green-600' : ($isPassed ? 'text-gray-600' : 'text-gray-500');
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
                                @case('diproses')
                                    Silakan mengikuti psikotes yang telah dikirim ke email Anda.
                                    @break
                                @case('psikotest')
                                    Anda telah mengikuti psikotes. Tim HR akan menghubungi Anda untuk jadwal wawancara.
                                    @break
                            @endswitch
                        </p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
