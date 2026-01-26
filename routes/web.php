<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PolyclinicController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dokter', [DoctorController::class, 'index'])->name('doctor.index');
Route::get('/poliklinik', [PolyclinicController::class, 'index'])->name('polyclinic.index');
