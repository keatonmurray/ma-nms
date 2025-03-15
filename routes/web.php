<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserDashboardController;

//Authentication Handlers
Route::get('/', [LoginController::class, 'index'])->name('auth.login');
Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');

//User Dashboard
Route::get('/user', [UserDashboardController::class, 'index'])->name('user.dashboard');
Route::post('user/store/{id}', [UserDashboardController::class, 'store'])->name('news.store');

//Admin Dashboard
Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

