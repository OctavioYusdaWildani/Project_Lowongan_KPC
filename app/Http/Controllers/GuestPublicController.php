<?php

namespace App\Http\Controllers;

use App\Models\Ptk;    
use Illuminate\Http\Request;

class GuestPublicController extends Controller
{
    public function index()
    {
        $lowongans = Ptk::where('is_published', true)->latest()->get();
        return view('guestpublic.lowongan.index', compact('lowongans'));
    }

    public function show(Ptk $ptk)
    {
        if (!$ptk->is_published) {
        abort(403, 'Lowongan belum tersedia.');
    }
        return view('guestpublic.lowongan.show', compact('ptk'));
    }

}
