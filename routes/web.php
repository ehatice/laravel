<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get("/", [LoginController::class, "login"]);
Route::get("login", [LoginController::class, "login"])->name('login');
Route::post('login-process', [LoginController::class, "loginProcess"]);
Route::get('logout', [LoginController::class, 'logout']);



Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'getDashboard']);
});