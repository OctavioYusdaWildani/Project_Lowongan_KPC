<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PTK extends Model
{
    protected $table = 'ptks';  

    protected $fillable = [
        'user_id',
        'unit', 
        'jabatan', 
        'tanggal_permintaan', 
        'Jumlah_tenaga_kerja', 
        'jumlah_permintaan',
        'departemen', 
        'status_karyawan', 
        'pendidikan', 
        'jenis_kelamin', 
        'usia', 
        'pengalaman',
        'bahasa_asing', 
        'keahlian_khusus', 
        'Tes_buta_warna', 
        'uraian_singkat', 
        'struktur_organisasi',
        'permintaan', 
        'alasan',
        'image',
        'status_manager',
        'status_director',
        'status_hr',
        'is_published',
        'reject_reason_manager',
        'reject_reason_director',
        'reject_reason_hr',
    ];
}
