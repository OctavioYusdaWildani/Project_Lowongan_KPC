<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ptk;
use Illuminate\Support\Facades\Auth;
use App\Mail\PtkNotificationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PTKController extends Controller
{
    public function create()
    {
        return view('staff.ptk.create'); 
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'unit' => 'required|string',
            'jabatan' => 'required|string',
            'tanggal_permintaan' => 'required|date',
            'Jumlah_tenaga_kerja' => 'required|string',
            'jumlah_permintaan' => 'required|string',
            'departemen' => 'required|string',
            'status_karyawan' => 'required|in:bulanan,harian,kontrak',
            'pendidikan' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'usia' => 'required|string',    
            'pengalaman' => 'required|string',
            'bahasa_asing' => 'required|string',
            'keahlian_khusus' => 'required|string',
            'Tes_buta_warna' => 'required|string',
            'uraian_singkat' => 'required|string',
            'struktur_organisasi' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'permintaan' => 'required|in:penggantian,penambahan',
            'alasan' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ], [
            'struktur_organisasi.image' => 'File harus berupa gambar.',
            'struktur_organisasi.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, atau svg.',
            'struktur_organisasi.max' => 'Ukuran gambar maksimal 10MB.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, atau svg.',
            'image.max' => 'Ukuran gambar maksimal 10MB.',
        ]);
        
        if ($request->hasFile('struktur_organisasi')) {
            $strukturPath = $request->file('struktur_organisasi')->store('struktur_organisasi', 'public');
            $validated['struktur_organisasi'] = $strukturPath;
        }
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('ptk_images', 'public');
            $validated['image'] = $path;
        }     

        $validated['status_manager'] = 'pending';
        $validated['status_director'] = 'pending';
        $validated['status_hr'] = 'pending';
        $validated['is_published'] = false;

        $validated['user_id'] = Auth::id();
        $ptk = Ptk::create($validated);
        
        $managers = User::where('role', 'department_manager')->get();
        foreach ($managers as $manager) {
            Mail::to($manager->email)->send(new PtkNotificationMail($ptk, 'Pengajuan PTK baru telah dibuat dan menunggu persetujuan Anda.'));
        }
        return redirect()->route('ptk.index')->with('success', 'Pengajuan PTK berhasil dikirim.');
    }
    public function approve(Request $request, Ptk $ptk)
    {
        $user = Auth::user();
    
        if ($user->role === 'department_manager') {
  
            $ptk->status_manager = 'approved';

        $directors = User::where('role', 'director')->get();
        foreach ($directors as $director) {
        Mail::to($director->email)->send(new PtkNotificationMail($ptk, 'PTK telah disetujui oleh Manager dan menunggu persetujuan Anda.'));
            }  

        } elseif ($user->role === 'director') {
  
            $ptk->status_director = 'approved';

        $hrManagers = User::where('role', 'hr_manager')->get();
        foreach ($hrManagers as $hr) {
            Mail::to($hr->email)->send(new PtkNotificationMail($ptk, 'PTK telah disetujui oleh Director dan menunggu persetujuan HR Manager.'));
            }
    
        } elseif ($user->role === 'hr_manager') {

            $ptk->status_hr = 'approved';
            $ptk->is_published = true;
    
        } else {
            return back()->with('error', 'Anda tidak memiliki hak untuk approve.');
        }
    
        $ptk->save();
    
        return back()->with('success', 'PTK berhasil di-approve.');
    }
    
    public function reject(Request $request, Ptk $ptk)
    {
        $user = Auth::user();

        $request->validate([
            'reject_reason' => 'required|string'
        ]);

        if ($user->role === 'department_manager') {
            if ($ptk->status_manager !== 'pending') {
                return back()->with('error', 'PTK sudah diproses oleh Manager.');
            }
            $ptk->status_manager = 'rejected';
            $ptk->reject_reason_manager = $request->reject_reason;

        } elseif ($user->role === 'director') {
            if ($ptk->status_manager !== 'approved') {
                return back()->with('error', 'PTK belum disetujui oleh Manager.');
            }
            if ($ptk->status_director !== 'pending') {
                return back()->with('error', 'PTK sudah diproses oleh Director.');
            }
            $ptk->status_director = 'rejected';
            $ptk->reject_reason_director = $request->reject_reason;

        } elseif ($user->role === 'hr_manager') {
            if ($ptk->status_director !== 'approved') {
                return back()->with('error', 'PTK belum disetujui oleh Director.');
            }
            if ($ptk->status_hr !== 'pending') {
                return back()->with('error', 'PTK sudah diproses oleh HR Manager.');
            }
            $ptk->status_hr = 'rejected';
            $ptk->reject_reason_hr = $request->reject_reason;

        } else {
            return back()->with('error', 'Anda tidak memiliki hak untuk reject.');
        }

        $ptk->is_published = false;
        $ptk->save();

        $creator = User::find($ptk->user_id);
        if ($creator) {
            Mail::to($creator->email)->send(new PtkNotificationMail($ptk, 'PTK Anda ditolak oleh ' . ucfirst($user->role) . ': ' . $request->reject_reason));
        }
        
        return back()->with('success', 'PTK berhasil ditolak.');
    }
public function edit(Ptk $ptk)
{
    $user = Auth::user();
    if ($user->role !== 'staff') {
        return redirect()->route('ptk.index')->with('error', 'Hanya staff yang bisa mengedit pengajuan.');
    }

    if (
        $ptk->status_manager !== 'rejected' &&
        $ptk->status_director !== 'rejected' &&
        $ptk->status_hr !== 'rejected'
    ) {
        return redirect()->route('ptk.index')->with('error', 'PTK hanya bisa diedit jika ditolak.');
    }

    return view('staff.ptk.edit', compact('ptk'));
}

public function update(Request $request, Ptk $ptk)
{
    $validated = $request->validate([
        'unit' => 'required|string',
        'jabatan' => 'required|string',
        'tanggal_permintaan' => 'required|date',
        'Jumlah_tenaga_kerja' => 'required|string',
        'jumlah_permintaan' => 'required|string',
        'departemen' => 'required|string',
        'status_karyawan' => 'required|in:bulanan,harian,kontrak',
        'pendidikan' => 'required|string',
        'jenis_kelamin' => 'required|string',
        'usia' => 'required|string',
        'pengalaman' => 'required|string',
        'bahasa_asing' => 'required|string',
        'keahlian_khusus' => 'required|string',
        'Tes_buta_warna' => 'required|string',
        'uraian_singkat' => 'required|string',
        'permintaan' => 'required|in:penggantian,penambahan',
        'alasan' => 'nullable|string',
        'struktur_organisasi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
    ]);

    if ($request->hasFile('struktur_organisasi')) {
        $validated['struktur_organisasi'] = $request->file('struktur_organisasi')->store('struktur_organisasi', 'public');
    }

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('ptk_images', 'public');
    }

    $ptk->update($validated);

    return redirect()->route('ptk.show', $ptk->id)->with('success', 'PTK berhasil diperbarui. Silakan klik "Ajukan Ulang" untuk mengirim ulang.');
    }

    public function resubmit(Ptk $ptk)
    {
        $user = Auth::user();
        if ($user->role !== 'staff') {
            return redirect()->route('ptk.index')->with('error', 'Hanya staff yang bisa mengajukan ulang.');
        }

        // Reset status approval
        $ptk->update([
            'status_manager' => 'pending',
            'status_director' => 'pending',
            'status_hr' => 'pending',
            'is_published' => false,
            'reject_reason_manager' => null,
            'reject_reason_director' => null,
            'reject_reason_hr' => null,
        ]);

        return redirect()->route('ptk.index')->with('success', 'PTK berhasil diajukan ulang dan menunggu persetujuan kembali.');
    }

    public function exportCsv()
    {
        $ptks = \App\Models\Ptk::all();

        $csvHeader = [
            'Unit', 
            'Jabatan', 
            'Departemen', 
            'Tanggal Permintaan', 
            'Jumlah Tenaga Kerja', 
            'Jumlah Permintaan',
            'Pendidikan', 
            'Jenis Kelamin', 
            'Usia', 
            'Status Karyawan', 
            'Pengalaman', 
            'Bahasa Asing',
            'Keahlian Khusus', 
            'Tes Buta Warna', 
            'Uraian Singkat', 
            'Permintaan', 
            'Alasan', 
            'Status'
        ];

        $rows = [];

        foreach ($ptks as $ptk) {
            $status = 'Pending';
            if ($ptk->status_manager === 'rejected' || $ptk->status_director === 'rejected' || $ptk->status_hr === 'rejected') {
                $status = 'Rejected';
            } elseif ($ptk->is_published) {
                $status = 'Approved';
            }

            $rows[] = [
                $ptk->unit,
                $ptk->jabatan,
                $ptk->departemen,
                $ptk->tanggal_permintaan,
                $ptk->Jumlah_tenaga_kerja,
                $ptk->jumlah_permintaan,
                $ptk->pendidikan,
                $ptk->jenis_kelamin,
                $ptk->usia,
                $ptk->status_karyawan,
                $ptk->pengalaman,
                $ptk->bahasa_asing,
                $ptk->keahlian_khusus,
                $ptk->Tes_buta_warna,
                $ptk->uraian_singkat,
                $ptk->permintaan,
                $ptk->alasan,
                $status
            ];
        }

        $callback = function () use ($csvHeader, $rows) {
            $file = fopen('php://output', 'w');

            fputcsv($file, $csvHeader, ';');

            foreach ($rows as $row) {
                fputcsv($file, $row, ';');
            }

            fclose($file);
        };

        $filename = 'Data PTK ' . now()->format('d-m-Y') . '.csv';

        return response()->stream($callback, 200, [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=\"$filename\"",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ]);
    }


    public function show($id)
    {
        $ptk = Ptk::findOrFail($id); 

        return view('staff.ptk.show', compact('ptk')); 
    }
    public function index()
    {
        $ptks = Ptk::orderBy('created_at', 'desc')->get();
    
        return view('staff.ptk.index', compact('ptks'));
    }
}

