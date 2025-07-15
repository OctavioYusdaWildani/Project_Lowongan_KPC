<div class="form-group">
    <label for="captcha" class="block font-medium text-sm text-gray-700">Captcha</label>

    <div class="mb-2 flex items-center space-x-2">
        <span id="captcha-img">{!! captcha_img() !!}</span>
        <button type="button"
        class="border border-gray-500 text-gray-700 px-2 py-1 rounded hover:bg-gray-200 transition text-lg"
        id="reload-captcha"
        title="Muat ulang captcha">
        🔁
        </button>
    </div>

    <input id="captcha"
           type="text"
           class="form-control w-full border p-2 rounded @error('captcha') border-red-500 @enderror"
           name="captcha"
           placeholder="Masukkan kode di atas">

    @error('captcha')
        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
    @enderror
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById('reload-captcha');
        if (btn) {
            btn.addEventListener('click', function () {
                fetch('/refresh-captcha')
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('captcha-img').innerHTML = data.captcha;
                    });
            });
        }
    });
</script>
