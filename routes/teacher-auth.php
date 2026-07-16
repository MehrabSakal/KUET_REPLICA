<?php

use App\Http\Controllers\TeacherAuth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::middleware('guest:teacher')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware('auth:teacher')->group(function () {
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
});
