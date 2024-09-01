<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;



Route::get("/", [LoginController::class, "login"]);
Route::get("login", [LoginController::class, "login"])->name('login');
Route::post('login-process', [LoginController::class, "loginProcess"]);