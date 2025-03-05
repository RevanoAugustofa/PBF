<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/coba', function () {
    return view('coba');
});

Route::get('/pengajuanCuti', function () {
    return view('pengajuanCuti');
});

Route::get('/dashboard_mhs', function () {
    return view('dashboard_mhs');
});

Route::get('/riwayat', function () {
    return view('riwayat');
});

Route::get('/formCuti', function () {
    return view('formCuti');
});