<?php

use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
// In routes/web.php
Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->name('student.dashboard');
=======
Route::get('/', function () {
    return view('login');
});
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
>>>>>>> upstream/main
