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

Route::get('/Admin/dashboard_adm', function () {
    return view('Admin/dashboard_adm');
});

Route::get('/Mahasiswa/dashboard_mhs', function () {
    return view('Mahasiswa/dashboard_mhs');
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


//ADMIN->DATA MAHASISWA
Route::get('/Admin/tambah_data_mhs', function () {
    return view('Admin/tambah_data_mhs');
});
Route::get('/Admin/Edit/edit_mhs', function () {
    return view('Admin/Edit/edit_mhs');
});
Route::get('/Admin/data_mhs', function () {
    return view('Admin/data_mhs');
});

//ADMIN->DATA KAJUR
Route::get('/Admin/tambah_data_kajur', function () {
    return view('Admin/tambah_data_kajur');
});
Route::get('/Admin/Edit/edit_kajur', function () {
    return view('Admin/Edit/edit_kajur');
});
Route::get('/Admin/data_jurusan', function () {
    return view('Admin/data_jurusan');
});
Route::get('/Kajur/dashboard_kajur', function () {
    return view('Kajur/dashboard_kajur');
});
Route::get('/Kajur/cuti', function () {
    return view('Kajur/cuti');
});

