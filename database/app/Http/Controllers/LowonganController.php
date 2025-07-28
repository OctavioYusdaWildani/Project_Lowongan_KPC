<?php

namespace App\Http\Controllers;
use App\Models\Ptk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongans = Ptk::where('is_published', true)->orderBy('created_at', 'desc')->get();
        return view('guest.lowongan.index', compact('lowongans'));
    }

    public function show(Ptk $ptk)
{

    if (!$ptk->is_published) {
        abort(403, 'Lowongan belum tersedia.');
    }

    return view('guest.lowongan.show', compact('ptk'));
}

}
