<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get("/home", function () {
    echo "Hello World";
});

Route::post('loginn', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class)
        ->only('index');
});
