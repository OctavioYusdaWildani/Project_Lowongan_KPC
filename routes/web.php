<?php

use App\Http\Controllers\ApplyController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PTKController;
use App\Http\Controllers\PsikotestController;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use App\Http\Middleware\RoleMiddleware;
use Mews\Captcha\Facades\Captcha;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GuestPublicController;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/dashboard', function () {
    $user = Auth::user();
    return match ($user->role) {
        'guest' => redirect()->route('guest.rekrutmen'),
        'staff', 'department_manager', 'director', 'hr_manager' => redirect()->route('staff.dashboard'),
        default => abort(403, 'Role tidak dikenali'),
    };
})->middleware(['auth'])->name('dashboard');

// Dashboard
Route::middleware(['web'])->group(function () {
    Route::get('/guest-dashboard', function () {
        return view('guest.dashboard');
    })->middleware(RoleMiddleware::class . ':guest')->name('guest.dashboard');

    Route::get('/staff-dashboard', function () {
        return view('staff.dashboard', ['user' => Auth::user()]);
    })->middleware(RoleMiddleware::class . ':staff,department_manager,director,hr_manager')->name('staff.dashboard');
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// PTK
Route::middleware(['auth'])->group(function () {
    Route::resource('ptk', PTKController::class);
    Route::post('ptk/{ptk}/approve', [PTKController::class, 'approve'])->name('ptk.approve');
    Route::post('ptk/{ptk}/reject', [PTKController::class, 'reject'])->name('ptk.reject');
});

// PTK khusus pembuat
Route::middleware(['auth', RoleMiddleware::class . ':staff,department_manager,director,hr_manager'])->group(function () {
    Route::get('/ptk/create', [PTKController::class, 'create'])->name('ptk.create');
    Route::post('/ptk', [PTKController::class, 'store'])->name('ptk.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/ptk/{ptk}/edit', [PTKController::class, 'edit'])->name('ptk.edit');
    Route::put('/ptk/{ptk}', [PTKController::class, 'update'])->name('ptk.update');
    Route::post('/ptk/{ptk}/resubmit', [PTKController::class, 'resubmit'])->name('ptk.resubmit');
});

//Export Excel 
Route::get('/ptk/export/csv', [App\Http\Controllers\PtkController::class, 'exportCsv'])->name('ptk.export.csv');

// Lowongan
Route::get('/lowongan', [LowonganController::class, 'index'])->name('lowongan.index');
Route::get('/lowongan/{ptk}', [LowonganController::class, 'show'])->name('lowongan.show');

// Melamar (store)
Route::post('/lowongan/{ptk}/apply', [ApplyController::class, 'store'])->name('apply.store');

// Daftar Lamaran untuk staff
Route::middleware(['auth', RoleMiddleware::class . ':staff,department_manager,director,hr_manager'])->group(function () {
    Route::get('/daftar-lamaran', [ApplyController::class, 'index'])->name('lamaran.index');
    Route::get('/daftar-lamaran/{id}', [ApplyController::class, 'show'])->name('lamaran.show');

    Route::post('/daftar-lamaran/{id}/approve', [ApplyController::class, 'approve'])->name('lamaran.approve');
    Route::post('/daftar-lamaran/{id}/reject', [ApplyController::class, 'reject'])->name('lamaran.reject');

});

// Psikotest - Ajukan oleh staff
Route::post('/psikotest/ajukan/{lamaran}', [PsikotestController::class,'ajukan'])->name('psikotest.ajukan');

// Psikotest - Untuk guest
Route::middleware(['auth'])->group(function () {
    Route::get('/psikotest', [PsikotestController::class, 'index'])->name('psikotest.index');
    Route::post('/psikotest/submit', [PsikotestController::class, 'submit'])->name('psikotest.submit');

});

Route::get('/staff/lamaran/{id}/hasil', [PsikotestController::class, 'hasil'])->name('staff.lamaran.hasil');

Route::middleware(['auth',RoleMiddleware::class . ':hr_manager'])->group(function () {
    Route::get('/manage-psikotest', [PsikotestController::class, 'manageIndex'])->name('manage.psikotest.index');
    Route::post('/manage-psikotest/store', [PsikotestController::class, 'storeAkun'])->name('manage.psikotest.store');
});

Route::get('/refresh-captcha', function () {
    return response()->json(['captcha' => captcha_img()]);
});

Route::get('/test-email', function () {
    Mail::to('aliefyanhakim@gmail.com')->send(new TestEmail());
    return 'Email telah dikirim.';
});

//rekrutmen - guest
Route::middleware(['auth', RoleMiddleware::class . ':guest'])->group(function () {
    Route::get('/guest-rekrutmen', [ApplyController::class, 'progress'])->name('guest.rekrutmen');
});

//guest public
Route::get('/public', [GuestPublicController::class, 'index'])->name('guest.karir');
Route::get('/public/{id}', [GuestPublicController::class, 'show'])->name('guest.karir.show');

//public lowongan
Route::post('/ptk/{ptk}/publish', [PTKController::class, 'publish'])->name('ptk.publish');

// About untuk guest public (tidak perlu login)
Route::get('/about', function () {
    return view('guestpublic.dashboard');
})->name('guestpublic.dashboard'); 


require __DIR__.'/auth.php';
