<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserDashboardController;

//Authentication Handlers
Route::get('/', [LoginController::class, 'index'])->name('auth.login');
Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
Route::post('/register/store', [RegisterController::class, 'store'])->name('auth.store');

//User Dashboard
Route::get('/user', [UserDashboardController::class, 'index'])->name('user.dashboard');

//Admin Dashboard
Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

//News Controller
Route::post('/news/store/{id}', [NewsController::class, 'store'])->name('news.store');
