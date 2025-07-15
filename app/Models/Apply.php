<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $table = 'lamarans';
    protected $fillable = [
        'ptk_id', 
        'nama_lengkap', 
        'pendidikan',
        'jenis_kelamin',
        'usia',
        'pengalaman',
        'bahasa_asing',
        'keahlian_khusus', 
        'email', 
        'telepon', 
        'cv_path', 
        'images'
    ];

    protected $casts = [
        'images' => 'array',
    ];
    public function ptk()
    {
        return $this->belongsTo(PTK::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function psikotest()
    {
        return $this->hasOne(Psikotest::class);
    }
    

}
