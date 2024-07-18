<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
|
*/

// Login page
Route::get('/auth/login', [AuthController::class, "loginShow"])->name("login");

// Login process
Route::post('/auth/login', [AuthController::class, "login"])->name("login.submit");

/* --------------------------------------------------------------------- */

/*
|--------------------------------------------------------------------------
| Back-office: Dashboard
|--------------------------------------------------------------------------
|
*/

// Dashboard page
Route::get('/back-office/dashboard', [DashboardController::class, "index"])->name("back-office.dashboard");

/* --------------------------------------------------------------------- */
