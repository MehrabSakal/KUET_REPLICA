<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\FacultyController as AdminFacultyController;

Route::get('/', function () {
    return view('home');
});

Route::get('/academics', function () {
    return view('academics');
});

Route::get('/faculty', function () {
    $faculties = \App\Models\Faculty::all();
    return view('faculty', compact('faculties'));
});

Route::get('/students', function () {
    return view('students');
});

Route::get('/research', function () {
    return view('research');
});

Route::get('/administration', function () {
    return view('administration');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.faculty.index');
    });
    
    Route::resource('faculty', AdminFacultyController::class)->except(['show']);
});
