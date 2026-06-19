<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/academics', function () {
    return view('academics');
});

Route::get('/faculty', function () {
    return view('faculty');
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
