<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Akun_psikotest extends Model
{
    protected $fillable = [
    'nama',
    'email',
    'password', 
    'jadwal',
];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function psikotest()
    {
        return $this->belongsTo(Psikotest::class);
    }
}

