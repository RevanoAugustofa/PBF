<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/coba', function () {
    return view('coba');
});

Route::get('/Mahasiswa/pengajuanCuti', function () {
    return view('Mahasiswa/pengajuanCuti');
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

Route::get('/Admin/dashboard_adm', function () {
    return view('Admin/dashboard_adm');
});