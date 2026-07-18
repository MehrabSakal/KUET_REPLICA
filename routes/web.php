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
use App\Http\Controllers\FacultyPublicController;
use App\Http\Controllers\Teacher\TeacherDashboardController;
use App\Http\Controllers\Teacher\TeacherProfileController;

// Student Verification Routes
Route::get('/verify-student', [StudentVerificationController::class, 'showVerifyForm'])->name('student.verify');
Route::post('/verify-student', [StudentVerificationController::class, 'verify'])->name('student.verify.submit');

Route::get('/', function () {
    return view('home');
});

Route::get('/academics', function () {
    return view('academics');
});

Route::get('/academics/{faculty}', function ($faculty) {
    $data = [
        'civil-engineering' => [
            'name' => 'Faculty of Civil Engineering',
            'icon' => '🏗️',
            'departments' => [
                'Department of Civil Engineering',
                'Department of Urban and Regional Planning',
                'Department of Building Engineering and Construction Management',
                'Department of Architecture'
            ]
        ],
        'science-and-humanities' => [
            'name' => 'Faculty of Science and Humanities',
            'icon' => '⚛️',
            'departments' => [
                'Department of Mathematics',
                'Department of Physics',
                'Department of Chemistry',
                'Department of Humanities and Business'
            ]
        ],
        'eee' => [
            'name' => 'Faculty of Electrical and Electronic Engineering',
            'icon' => '⚡',
            'departments' => [
                'Department of Electrical and Electronic Engineering',
                'Department of Computer Science and Engineering',
                'Department of Electronics and Communication Engineering',
                'Department of Biomedical Engineering',
                'Department of Materials Science and Engineering'
            ]
        ],
        'mechanical-engineering' => [
            'name' => 'Faculty of Mechanical Engineering',
            'icon' => '⚙️',
            'departments' => [
                'Department of Mechanical Engineering',
                'Department of Industrial Engineering and Management',
                'Department of Energy Science and Engineering',
                'Department of Leather Engineering',
                'Department of Textile Engineering',
                'Department of Chemical Engineering',
                'Department of Mechatronics Engineering'
            ]
        ]
    ];
    
    if (!array_key_exists($faculty, $data)) {
        abort(404);
    }
    
    return view('faculty-departments', ['facultyData' => $data[$faculty]]);
})->name('academics.faculty');

Route::get('/faculty', [FacultyPublicController::class, 'index'])->name('faculty.index');
Route::get('/faculty/{id}', [FacultyPublicController::class, 'show'])->name('faculty.show');

Route::middleware('student.auth')->group(function () {
    Route::post('/faculty/{id}/research-request', [FacultyPublicController::class, 'submitResearchRequest'])->name('faculty.research-request');
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
    
    // Class Schedule Routes
    Route::get('/class-schedule', [App\Http\Controllers\ClassScheduleController::class, 'index'])->name('class-schedule.index');
    Route::get('/class-schedule/{department}', [App\Http\Controllers\ClassScheduleController::class, 'department'])->name('class-schedule.department');
    Route::get('/class-schedule/{department}/year/{year}', [App\Http\Controllers\ClassScheduleController::class, 'yearSchedule'])->name('class-schedule.year-schedule');
    Route::get('/class-schedule/{department}/empty-rooms', [App\Http\Controllers\ClassScheduleController::class, 'emptyRooms'])->name('class-schedule.empty-rooms');
});

Route::get('/administration', function () {
    return view('administration');
});

Route::get('/bus-schedule', [BusScheduleController::class, 'index'])->name('bus-schedule.index');

// Authentication Routes
require __DIR__.'/auth.php';
require __DIR__.'/teacher-auth.php';

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.faculty.index');
    });
    
    Route::resource('faculty', AdminFacultyController::class)->except(['show']);
    Route::resource('students', AdminStudentController::class)->except(['show']);
    Route::resource('lost-and-found', AdminLostAndFoundController::class)->except(['show', 'create', 'store']);
    Route::resource('bus-schedule', AdminBusScheduleController::class)->except(['show']);
    Route::resource('class-schedule', App\Http\Controllers\Admin\ClassScheduleController::class)->except(['show']);
});

// Teacher Routes
Route::prefix('teacher')->name('teacher.')->group(function () {
    // Authenticated Teacher Routes
    Route::middleware('auth:teacher')->group(function () {
        Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('dashboard');
        
        Route::post('/research-requests/{id}/approve', [TeacherDashboardController::class, 'approveRequest'])->name('research-request.approve');
        Route::post('/research-requests/{id}/reject', [TeacherDashboardController::class, 'rejectRequest'])->name('research-request.reject');
        
        Route::get('/profile/edit', [TeacherProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/update', [TeacherProfileController::class, 'update'])->name('profile.update');
    });
});
