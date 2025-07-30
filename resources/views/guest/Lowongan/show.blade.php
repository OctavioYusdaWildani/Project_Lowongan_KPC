<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                {{-- Notifikasi sukses --}}
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Notifikasi error validasi --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{--Detail lowongan--}}
                <h3 class="text-3xl font-bold mb-6 text-center">
                    {{ $ptk->jabatan }} - {{ $ptk->unit }}
                </h3>
                <table class="table-auto w-full border-2 border-black text-left mb-6">
                    <thead>
                        <tr>
                            <th colspan="2" class="border-2 border-black px-4 py-2 bg-gray-100 text-lg font-semibold">
                                Kualifikasi & Uraian
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                            <th class="border-2 border-black px-4 py-2">Departemen</th>
                            <td class="border-2 border-black px-4 py-2">{{ $ptk->departemen }}</td>
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
                            <th class="border-2 border-black px-4 py-2">Uraian Singkat</th>
                            <td class="border-2 border-black px-4 py-2">{{ $ptk->uraian_singkat }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-6 flex gap-4">
                    <form action="{{ route('lowongan.index') }}" method="GET">
                        <button type="submit" class="bg-gray-200 text-gray-800 px-6 py-2 rounded hover:bg-gray-300">
                            ← Kembali ke daftar lowongan
                        </button>
                    </form>

                    {{-- Tombol Trigger --}}
                    <button onclick="document.getElementById('applyModal').classList.remove('hidden')" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                        Lamar Posisi
                    </button>
                </div>

                {{-- Modal --}}
                <div id="applyModal" class="{{ $errors->any() ? '' : 'hidden' }} fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white w-full max-w-3xl rounded-lg shadow-lg p-6 relative overflow-y-auto max-h-[90vh]">
                        <button onclick="document.getElementById('applyModal').classList.add('hidden')" class="absolute top-2 right-3 text-gray-600 hover:text-gray-900 text-xl">&times;</button>
                        <h2 class="text-2xl font-bold mb-4">Formulir Lamaran</h2>
                        
                {{-- Notifikasi error validasi --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                        <form action="{{ route('apply.store', $ptk->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="w-full border p-2 rounded" required>
                                </div>
                                
                                <div>
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="w-full border p-2 rounded" required>
                                </div>
                                
                                <div>
                                    <label>Telepon</label>
                                    <input type="text" name="telepon" value="{{ old('telepon') }}" class="w-full border p-2 rounded" required>
                                </div>
                                
                                <div>
                                    <label>Pendidikan</label>
                                    <input type="text" name="pendidikan" value="{{ old('pendidikan') }}" class="w-full border p-2 rounded" required>
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
                                    <input type="number" name="usia" value="{{ old('usia') }}" class="w-full border p-2 rounded" required>
                                </div>
                                
                                <div class="md:col-span-2">
                                    <label>Pengalaman</label>
                                    <textarea name="pengalaman" class="w-full border p-2 rounded" required>{{ old('pengalaman') }}</textarea>
                                </div>
                                
                                <div>
                                    <label>Bahasa Asing</label>
                                    <input type="text" name="bahasa_asing" value="{{ old('bahasa_asing') }}" class="w-full border p-2 rounded" required>
                                </div>
                                
                                <div>
                                    <label>Keahlian Khusus</label>
                                    <input type="text" name="keahlian_khusus" value="{{ old('keahlian_khusus') }}" class="w-full border p-2 rounded" required>
                                </div>
                                
                                <div>
                                    <label>Upload CV (PDF)</label>
                                    <input type="file" name="cv" class="w-full border p-2 rounded" required>
                                </div>
                                
                                <div>
                                    <label>Upload Gambar Pendukung</label>
                                    <input type="file" id="imageInput" name="images[]" class="w-full border p-2 rounded" multiple>
                                    <div id="imagePreviewContainer" class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4"></div>
                                </div>

                            </div>

                            {{-- Captcha --}}
                            <x-captcha />

                            <x-primary-button class="mt-4">
                                Ajukan Lamaran
                            </x-primary-button>                    
                        </form>
                    </div>
                </div>               
            </div>
        </div>
    </div>
    
    <!-- Script Untuk Image Container -->
    <script>
        let selectedFiles = [];

        const imageInput = document.getElementById('imageInput');
        const previewContainer = document.getElementById('imagePreviewContainer');

        imageInput?.addEventListener('change', function(event) {
            const newFiles = Array.from(event.target.files);
            selectedFiles = selectedFiles.concat(newFiles);

            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            imageInput.files = dataTransfer.files;

            updatePreview();
        });

        function updatePreview() {
            previewContainer.innerHTML = '';

            selectedFiles.forEach((file, index) => {
                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();
                reader.onload = function(e) {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'relative border rounded overflow-hidden shadow';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-full h-auto';

                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className = 'absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-700';
                    removeBtn.innerText = '×';
                    removeBtn.onclick = () => {
                        selectedFiles.splice(index, 1);
                        updateInputFiles();
                        updatePreview();
                    };

                    wrapper.appendChild(img);
                    wrapper.appendChild(removeBtn);
                    previewContainer.appendChild(wrapper);
                };
                reader.readAsDataURL(file);
            });
        }

        function updateInputFiles() {
            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            imageInput.files = dataTransfer.files;
        }
    </script>
</x-app-layout>
