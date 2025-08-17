<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// Rute Publik (bisa diakses semua orang)
Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Rute Autentikasi (memerlukan login)
Route::middleware(['auth', 'verified'])->group(function () {
    // Rute Dashboard (hanya untuk admin)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('admin')->name('dashboard');

    // Rute Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute untuk Manajemen Berita (khusus admin)
    Route::middleware('admin')->group(function () {
        Route::post('/news', [NewsController::class, 'store'])->name('news.store');
        Route::get('/news/{slug}/edit', [NewsController::class, 'edit'])->name('news.edit');
        Route::put('/news/{slug}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/news/{slug}', [NewsController::class, 'destroy'])->name('news.destroy');
    });
});

// Memuat rute autentikasi
require __DIR__.'/auth.php';