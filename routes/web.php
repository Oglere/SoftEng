<?php

use Illuminate\Support\Facades\Route;

// In routes/web.php
Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->name('student.dashboard');