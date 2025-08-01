<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Psikotest extends Model
{
    protected $fillable = [
        'user_id', 
        'answers', 
        'result'];
    protected $casts = ['answers' => 'array'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function akun()
{
    return $this->hasOne(AkunPsikotest::class);
}


}
