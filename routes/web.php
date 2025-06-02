<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AlarmController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\Admin\AdminController as AdminController;
use App\Http\Controllers\HbRecordController;
use App\Http\Controllers\MedHistoryController;

// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('user.login');
Route::get('/auth/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('user.logout');

// Guest
Route::middleware('guest')->group(function () {
    Route::get('/', [PageController::class, 'welcome'])->name('welcome_guest');
    Route::get('/promotive_guest', [PageController::class, 'promotive'])->name('promotive_guest');
});

// Admin Authenticated Pages
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/edukasi', [AdminController::class, 'edukasi'])->name('admin_edukasi');
    Route::get('/admin/preventif', [AdminController::class, 'preventif'])->name('admin_preventif');
    Route::get('/admin/progress', [AdminController::class, 'progress'])->name('admin_progress');
});

// Authenticated Pages
Route::middleware('auth')->group(function () {
    Route::get('/welcome', [PageController::class, 'welcome'])->name('welcome');
    Route::get('/edukasi', [PageController::class, 'tingkat_pengetahuan_ibu_hamil'])->name('edukasi');
    Route::post('/edukasi', [PageController::class, 'submitQuiz'])->name('knowledge.quiz.submit');
    Route::get('/promotive', [PageController::class, 'promotive'])->name('promotive');
    Route::get('/preventive', [PageController::class, 'preventive'])->name('preventive');
    Route::post('/preventive', [PageController::class, 'submitKuesioner'])->name('preventif.submitKuesioner');
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/certificate', [PageController::class, 'certificate'])->name('certificate');
    Route::get('/contact_us', [PageController::class, 'contact_us'])->name('contact_us');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/update-dosis', [ProfileController::class, 'updateDosis'])->name('profile.updateDosis');

    Route::get('/kadar_hb', [HbRecordController::class, 'kadar_hb'])->name('kadar_hb');
    Route::post('/hb/store', [HbRecordController::class, 'store'])->name('hb.store');

    Route::post('/diagnosa/store', [DiagnosaController::class, 'store'])->name('diagnosa.store');

    Route::get('/riwayat_konsumsi', [MedHistoryController::class, 'riwayat_konsumsi'])->name('riwayat_konsumsi');
    Route::post('/riwayat_konsumsi/store', [MedHistoryController::class, 'store'])->name('riwayat_konsumsi.store');

    Route::get('/alarm', [PageController::class, 'alarm'])->name('alarm');
    Route::post('/alarms', [AlarmController::class, 'store']);
    Route::get('/alarms', [AlarmController::class, 'index']);
    Route::get('/alarms/{id}', [AlarmController::class, 'show']);
    Route::delete('/alarms/{id}', [AlarmController::class, 'destroy']);
    Route::put('/alarms/{id}', [AlarmController::class, 'update']);
    Route::get('/upcoming', [AlarmController::class, 'upcomingAlarms']);
    Route::post('/alarms/toggle/{id}', [AlarmController::class, 'toggleActive']);
    Route::post('/alarm/{id}/dismiss', [AlarmController::class, 'dismissAlarm']);
    Route::post('/alarm/{id}/snooze', [AlarmController::class, 'snoozeAlarm']);

    Route::get('/notif', [MedHistoryController::class, 'notif'])->name('notif');
});


