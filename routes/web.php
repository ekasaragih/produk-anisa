<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('user.login');
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::get('/', function () {
    return view('tingkat_pengetahuan_ibu_hamil');
});

// this should be using authentication
Route::get('/promotive', [PageController::class, 'promotive'])->name('promotive');
Route::get('/preventive', [PageController::class, 'preventive'])->name('preventive');
Route::get('/monitoring', [PageController::class, 'monitoring'])->name('monitoring');
Route::get('/certificate', [PageController::class, 'certificate'])->name('certificate');
Route::get('/input_kadar_hb', [PageController::class, 'input_kadar_hb'])->name('input_kadar_hb');
Route::get('/contact_us', [PageController::class, 'contact_us'])->name('contact_us');
