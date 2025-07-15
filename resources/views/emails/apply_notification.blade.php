<h2>📩 Lamaran Baru Masuk</h2>
<p><strong>Nama:</strong> {{ $lamaran->nama_lengkap }}</p>
<p><strong>Email:</strong> {{ $lamaran->email }}</p>
<p><strong>Telepon:</strong> {{ $lamaran->telepon }}</p>
<p><strong>Lowongan:</strong> {{ $lamaran->ptk->jabatan ?? 'N/A' }}</p>

<p>Silakan login ke sistem untuk melihat detail lebih lanjut.</p>
