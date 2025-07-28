<?php

namespace App\Http\Controllers;

use App\Mail\ApplyNotificationMail;
use App\Models\Apply;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\LamaranMasukMail;  
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Ptk;

class ApplyController extends Controller
{
    public function store(Request $request, $ptkId)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'pendidikan' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'usia' => 'required|integer|min:18|max:100',
            'pengalaman' => 'required|string|max:500',
            'bahasa_asing' => 'required|string|max:255',
            'keahlian_khusus' => 'required|string|max:255',
            'cv' => 'required|mimes:pdf|max:10240',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'captcha' => 'required|captcha'
        ], [
            'cv.mimes' => 'CV harus dalam format PDF.',
            'cv.max' => 'Ukuran CV maksimal 10MB.',
        
            'images.*.image' => 'File gambar pendukung harus berupa image.',
            'images.*.mimes' => 'Gambar hanya boleh format jpeg, png, jpg.',
            'images.*.max' => 'Ukuran gambar tidak boleh lebih dari 10MB.',
        
            'usia.min' => 'Usia minimal 18 tahun.',
            'usia.max' => 'Usia maksimal 100 tahun.',

            'captcha.captcha' => 'Captcha salah',
            'captcha.required' => 'Silakan verifikasi captcha.',
        ]);
        
        $cvPath = $request->file('cv')->store('cv', 'public');

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('lamaran_images', 'public');
            }
        }

        $lamaran = Apply::create([
            'ptk_id' => $ptkId,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'pendidikan' => $request->pendidikan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'pengalaman' => $request->pengalaman,
            'bahasa_asing' => $request->bahasa_asing,
            'keahlian_khusus' => $request->keahlian_khusus,
            'cv_path' => $cvPath,
            'images' => $imagePaths, 
        ]);
        
        $ptk = Ptk::find($ptkId);
        
        $hrManagers = User::where('role', 'hr_manager')->get();
        foreach ($hrManagers as $hr) {
            Mail::to($hr->email)->send(new ApplyNotificationMail($lamaran));
        }

        return back()->with('success', 'Lamaran berhasil dikirim!');
    }
    public function index()
    {
        $lamarans = Apply::with('ptk')->latest()->get(); 
        return view('staff.lamaran.index', compact('lamarans'));
    }
    
    public function show($id)
    {
        $lamaran = Apply::with('ptk')->findOrFail($id); // Hapus 'user'
        return view('staff.lamaran.show', compact('lamaran'));
    }
    
    public function progress()
{
    $user = auth()->user();

    // Ambil lamaran terbaru user berdasarkan email
    $lamaran = Apply::where('email', $user->email)->latest()->first();

    return view('guest.rekrutmen', compact('lamaran'));
}
public function approve($id)
{
    $lamaran = Apply::findOrFail($id);

    // Tahapan lamaran
    $tahapan = ['melamar', 'diproses', 'psikotest', 'hr_interview', 'user_interview', 'selesai'];

    // Cari posisi sekarang
    $index = array_search($lamaran->status, $tahapan);

    if ($index !== false && $index < count($tahapan) - 1) {
        $lamaran->status = $tahapan[$index + 1];
    }

    $lamaran->save();

    return back()->with('success', 'Lamaran dilanjutkan ke tahap berikutnya.');
}

public function reject($id)
{
    $lamaran = Apply::findOrFail($id);
    $lamaran->status = 'ditolak';
    $lamaran->save();

    return back()->with('error', 'Lamaran telah ditolak.');
}



}
