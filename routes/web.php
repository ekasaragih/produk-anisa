<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('user.login');
Route::get('/auth/register', [AuthController::class, 'register']);

Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('user.logout');


Route::get('/', [PageController::class, 'tingkat_pengetahuan_ibu_hamil'])->name('tingkat_pengetahuan_ibu_hamil');


// this should be using authentication
Route::get('/promotive', [PageController::class, 'promotive'])->name('promotive');
Route::get('/preventive', [PageController::class, 'preventive'])->name('preventive');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/alarm', [PageController::class, 'alarm'])->name('alarm');
Route::get('/riwayat_konsumsi', [PageController::class, 'riwayat_konsumsi'])->name('riwayat_konsumsi');
Route::get('/certificate', [PageController::class, 'certificate'])->name('certificate');
Route::get('/kadar_hb', [PageController::class, 'kadar_hb'])->name('kadar_hb');
Route::get('/contact_us', [PageController::class, 'contact_us'])->name('contact_us');
