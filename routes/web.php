<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('home');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/dash function () {
    return view('dashboard');
});

