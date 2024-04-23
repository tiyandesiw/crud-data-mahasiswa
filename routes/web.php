<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'mahasiswa');

Route::get('login', [LoginController::class, 'form'])->name('Login')->middleware('guest');
Route::post('login', [LoginController::class, 'process'])->middleware('guest');
Route::get('logout', [LoginController::class, 'logout'])->name('Logout')->middleware('auth');

Route::get('hash', function () {
    return Hash::make('admin');
});

Route::resource('mahasiswa', MahasiswaController::class)->names('Mahasiswa');
