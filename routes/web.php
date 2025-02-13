<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HbRecordController;
use App\Http\Controllers\MedHistoryController;

// Authentication
Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('user.login');
Route::get('/auth/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('user.logout');

// Guest
Route::middleware('guest')->group(function () {
    Route::get('/', [PageController::class, 'tingkat_pengetahuan_ibu_hamil'])->name('tingkat_pengetahuan_ibu_hamil');
    Route::get('/promotive_guest', [PageController::class, 'promotive'])->name('promotive_guest');
});

// Authenticated pages
Route::middleware('auth')->group(function () {
    Route::get('/edukasi', [PageController::class, 'tingkat_pengetahuan_ibu_hamil'])->name('edukasi');
    Route::get('/promotive', [PageController::class, 'promotive'])->name('promotive');
    Route::get('/preventive', [PageController::class, 'preventive'])->name('preventive');
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/alarm', [PageController::class, 'alarm'])->name('alarm');
    Route::get('/certificate', [PageController::class, 'certificate'])->name('certificate');
    Route::get('/contact_us', [PageController::class, 'contact_us'])->name('contact_us');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/update-dosis', [ProfileController::class, 'updateDosis'])->name('profile.updateDosis');

    Route::get('/kadar_hb', [HbRecordController::class, 'kadar_hb'])->name('kadar_hb');
    Route::post('/hb/store', [HbRecordController::class, 'store'])->name('hb.store');

    Route::get('/riwayat_konsumsi', [MedHistoryController::class, 'riwayat_konsumsi'])->name('riwayat_konsumsi');
    Route::post('/riwayat_konsumsi/store', [MedHistoryController::class, 'store'])->name('riwayat_konsumsi.store');


});
