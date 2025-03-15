<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('LoginComponent');
});

Route::get('/register', function () {
    return Inertia::render('RegisterComponent');
});

//Authentication

//User Dashboard
Route::get('/user', [UserDashboardController::class, 'index'])->name('user.dashboard');
Route::post('user/store/{id}', [UserDashboardController::class, 'store'])->name('news.store');

//Admin Dashboard
Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

