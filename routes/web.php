<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.master');
});

Route::resource('forms', FormController::class)->only([
    'index',
    'show',
    'store',
]);

Route::resource('register', RegistrationController::class)->only([
    'index',
    'show',
    'store',
]);
