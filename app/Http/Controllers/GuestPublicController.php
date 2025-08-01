<?php

namespace App\Http\Controllers;

use App\Models\Ptk;    
use Illuminate\Http\Request;

class GuestPublicController extends Controller
{
    public function index()
    {
        $lowongans = Ptk::where('is_published', true)->latest()->get();
        return view('guest_public', compact('lowongans'));
    }

}
