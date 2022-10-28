<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/", [AuthController::class, "viewDashboard"])->name("view.dashboard");
Route::get("dashboard", [AuthController::class, "viewDashboard"])->name("view.dashboard");
Route::get("profile", [AuthController::class, "viewProfile"])->name("view.profile");
Route::get("login", [AuthController::class, "viewLogin"])->name("view.login");
Route::get("register", [AuthController::class, "viewRegister"])->name("view.register");
Route::get("logout", [AuthController::class, "logout"])->name("logout");

Route::post("login", [AuthController::class, "login"])->name("login");
Route::post("register", [UserController::class, "create"])->name("register");
Route::post("profile", [UserController::class, "update"])->name("profile.update");
Route::post("change-password", [AuthController::class, "changePassword"])->name("password_change");
