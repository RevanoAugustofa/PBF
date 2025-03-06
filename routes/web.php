<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\MahasiswaController;
// use Illuminate\Support\Facades\Auth;

// Route::get('/Mahsiswa/dashboard_mhs', [MahasiswaController::class, 'dashboard_mhs'])->middleware('auth');
// Route::get('/', function () {
//     return view('/login');
// })->name('login');

// Route::post('/logout', function () {
//     Auth::logout();
//     return redirect('/login');
// })->name('logout');

Route::get('/', function () {
    return view('login');
});

Route::get('/coba', function () {
    return view('coba');
});

Route::get('/Admin/dashboard_adm', function () {
    return view('Admin/dashboard_adm');
});

Route::get('/Kajur/dashboard_kjur', function () {
    return view('Kajur/dashboard_kjur');
});

Route::get('/Mahasiswa/dashboard_mhs', function () {
    return view('Mahasiswa/dashboard_mhs');
});

Route::get('/Perpus/dashboard_prs', function () {
    return view('Perpus/dashboard_prs');
});

Route::get('/Dosen/dashboard_dsn', function () {
    return view('Dosen/dashboard_dsn');
});

Route::get('/Baup/dashboard_baup', function () {
    return view('Baup/dashboard_baup');
});

Route::get('/Mahasiswa/riwayat', function () {
    return view('Mahasiswa/riwayat');
});

Route::get('/Mahasiswa/formCuti', function () {
    return view('Mahasiswa/formCuti');
});

Route::get('/Mahasiswa/pengajuanCuti', function () {
    return view('Mahasiswa/pengajuanCuti');
});

