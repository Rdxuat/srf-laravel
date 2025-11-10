<?php

use App\Http\Controllers\InvestorController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/investor-relations', [InvestorController::class, 'index'])->name('investorRelations');

Route::get('/aos', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::middleware('guest')->prefix('aos')->group(function () {
    Route::get('/login', [AuthController::class, 'index_login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// Protected admin routes
Route::middleware('auth')->prefix('aos')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/account_settings', [AuthController::class, 'accountSettings'])->name('accountSettings');
    Route::post('/change_password', [AuthController::class, 'changePassword'])->name('changePassword');
    Route::get('/test', [AuthController::class, 'test'])->middleware('role:superadmin')->name('users');
    Route::get('/loginHistory', [LogController::class, 'loginHistory'])->name('loginHistory');
    Route::get('/logs', [LogController::class, 'index'])->name('logs');
    Route::get('/logs/download', [LogController::class, 'download'])->name('logs.download');
    Route::delete('/logs/delete', [LogController::class, 'delete'])->name('logs.delete');
});

