<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('siswa.index'));

Route::resource('siswa', SiswaController::class);
