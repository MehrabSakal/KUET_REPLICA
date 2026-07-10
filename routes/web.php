<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\FacultyController as AdminFacultyController;
use App\Http\Controllers\Admin\LostAndFoundController as AdminLostAndFoundController;
use App\Http\Controllers\Admin\BusScheduleController as AdminBusScheduleController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\LostAndFoundItemController;
use App\Http\Controllers\BusScheduleController;
use App\Http\Controllers\StudentVerificationController;
use App\Http\Controllers\ResearchController;

// Student Verification Routes
Route::get('/verify-student', [StudentVerificationController::class, 'showVerifyForm'])->name('student.verify');
Route::post('/verify-student', [StudentVerificationController::class, 'verify'])->name('student.verify.submit');

Route::get('/', function () {
    return view('home');
});

Route::get('/academics', function () {
    return view('academics');
});

Route::get('/faculty', [\App\Http\Controllers\FacultyPublicController::class, 'index'])->name('faculty.index');
Route::get('/faculty/{id}', [\App\Http\Controllers\FacultyPublicController::class, 'show'])->name('faculty.show');

Route::middleware('student.auth')->group(function () {
    Route::post('/faculty/{id}/research-request', [\App\Http\Controllers\FacultyPublicController::class, 'submitResearchRequest'])->name('faculty.research-request');
});

Route::get('/students', function () {
    return view('students');
});

Route::get('/research', [ResearchController::class, 'index'])->name('research');

Route::get('/events', function () {
    return view('events');
});

Route::get('/lost-and-found', [LostAndFoundItemController::class, 'index'])->name('lost-and-found.index');

Route::middleware('student.auth')->group(function () {
    Route::get('/lost-and-found/create', [LostAndFoundItemController::class, 'create'])->name('lost-and-found.create');
    Route::post('/lost-and-found', [LostAndFoundItemController::class, 'store'])->name('lost-and-found.store');
    Route::post('/lost-and-found/{id}/resolve', [LostAndFoundItemController::class, 'resolve'])->name('lost-and-found.resolve');
});

Route::get('/administration', function () {
    return view('administration');
});

Route::get('/bus-schedule', [BusScheduleController::class, 'index'])->name('bus-schedule.index');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.faculty.index');
    });
    
    Route::resource('faculty', AdminFacultyController::class)->except(['show']);
    Route::resource('students', AdminStudentController::class)->except(['show']);
    Route::resource('lost-and-found', AdminLostAndFoundController::class)->except(['show', 'create', 'store']);
    Route::resource('bus-schedule', AdminBusScheduleController::class)->except(['show']);
});

// Teacher Routes
Route::prefix('teacher')->name('teacher.')->group(function () {
    // Guest Teacher Routes
    Route::middleware('guest:teacher')->group(function () {
        Route::get('/login', [\App\Http\Controllers\Teacher\TeacherAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [\App\Http\Controllers\Teacher\TeacherAuthController::class, 'login'])->name('login.submit');
    });

    // Authenticated Teacher Routes
    Route::middleware('auth:teacher')->group(function () {
        Route::post('/logout', [\App\Http\Controllers\Teacher\TeacherAuthController::class, 'logout'])->name('logout');
        
        Route::get('/dashboard', [\App\Http\Controllers\Teacher\TeacherDashboardController::class, 'index'])->name('dashboard');
        
        Route::post('/research-requests/{id}/approve', [\App\Http\Controllers\Teacher\TeacherDashboardController::class, 'approveRequest'])->name('research-request.approve');
        Route::post('/research-requests/{id}/reject', [\App\Http\Controllers\Teacher\TeacherDashboardController::class, 'rejectRequest'])->name('research-request.reject');
        
        Route::get('/profile/edit', [\App\Http\Controllers\Teacher\TeacherProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/update', [\App\Http\Controllers\Teacher\TeacherProfileController::class, 'update'])->name('profile.update');
    });
});
