<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('ringkasan');
});

Route::get('/piket', function () {
    return view('piket');
});

Route::get('/siswa', function () {
    return view('siswa');
});

Route::get('/pengumuman', function () {
    return view('pengumuman');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});
