<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PolyclinicController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search/suggestions', [SearchController::class, 'suggestions'])->name('search.suggestions');
Route::get('/dokter', [DoctorController::class, 'index'])->name('doctor.index');
Route::get('/dokter/{doctor}', [DoctorController::class, 'show'])->name('doctor.show');
Route::get('/poliklinik', [PolyclinicController::class, 'index'])->name('polyclinic.index');
Route::get('/page/{page:slug}', [PageController::class, 'show'])->name('page.show');
Route::get('/poliklinik/{unit:slug}', [PolyclinicController::class, 'show'])->name('polyclinic.show');
Route::get('/berita', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/berita/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');


