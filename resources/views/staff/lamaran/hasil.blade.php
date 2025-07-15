<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-4">Hasil Psikotest</h2>

            <p><strong>Nama:</strong> {{ $lamaran->nama_lengkap }}</p>
            <p><strong>Email:</strong> {{ $lamaran->email }}</p>

            @if($psikotest)
                <p class="mt-4"><strong>Hasil MBTI:</strong> {{ $psikotest->result }}</p>

                @php
                    $questions = json_decode(file_get_contents(public_path('list.json')), true)['questions'];
                @endphp

                <h3 class="text-lg font-semibold mt-4">Detail Jawaban:</h3>

                <table class="table-auto w-full border-2 border-black text-left mt-2">
                    <thead>
                        <tr>
                            <th class="border-2 border-black px-4 py-2">No</th>
                            <th class="border-2 border-black px-4 py-2">Pertanyaan</th>
                            <th class="border-2 border-black px-4 py-2">Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($psikotest->answers as $index => $answer)
                            <tr>
                                <td class="border-2 border-black px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border-2 border-black px-4 py-2">{{ $questions[$index]['title'] }}</td>
                                <td class="border-2 border-black px-4 py-2 text-green-700">
                                    {{ $questions[$index]['selections'][$answer] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @else
                    <p class="text-gray-500 mt-4">Belum ada hasil psikotest.</p>
                @endif

        </div>
    </div>
</x-app-layout>
