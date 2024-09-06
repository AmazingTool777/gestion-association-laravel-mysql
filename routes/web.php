<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationCallController;
use App\Http\Controllers\AssociationEventController;
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

// Signup page
Route::get('/auth/signup', [AuthController::class, "signupShow"])->name("signup");

// Signup process
Route::post('/auth/signup', [AuthController::class, "signup"])->name("signup.submit");

// Logout
Route::post('/auth/logout', [AuthController::class, "logout"])->name("logout.submit");

//evenements
Route::resource('events', AssociationEventController::class);
Route::post('/store_event', [AssociationEventController::class, "store"])->name("store_event");
Route::get('/download_pdf/{id}', [AssociationEventController::class, "downloadPDF"])->name("download_pdf");


/* --------------------------------------------------------------------- */



/*
|--------------------------------------------------------------------------
| Donation call
|--------------------------------------------------------------------------
|
*/

// Donation calls page
Route::get("/donation-calls", [DonationCallController::class, "index"])->name("donation-calls");

// Donation calls page
Route::get("/donation-calls/{donationCall}", [DonationCallController::class, "show"])->name("donation-call");

// Downloads the PDF of the donation call
Route::get("/donation-calls/{donationCall}/pdf", [DonationCallController::class, "downloadPDF"])->name("donation-call.pdf");

/* --------------------------------------------------------------------- */



/*
|--------------------------------------------------------------------------
| Donation
|--------------------------------------------------------------------------
|
*/

Route::post("/donations", [DonationController::class, "store"])->middleware("auth")->name("donation.store");

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
