<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Psikotest MBTI') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <strong>Ada kesalahan:</strong>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('psikotest.submit') }}">
                    @csrf
                    @foreach ($questions as $index => $question)
                    <div class="mb-6">
                        <p class="font-semibold mb-2">{{ $index + 1 }}. {{ $question['title'] }}</p>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($question['selections'] as $optionIndex => $option)
                                <label class="block w-full cursor-pointer">
                                    <input 
                                        type="radio" 
                                        name="answers[{{ $index }}]" 
                                        value="{{ $optionIndex }}" 
                                        class="peer hidden" 
                                        required
                                    >
                                    <div class="select-none w-full text-center border rounded-lg px-4 py-3 peer-checked:bg-green-500 peer-checked:text-black transition-all">
                                        {{ $option }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                     @endforeach
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                            Kirim Jawaban
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
