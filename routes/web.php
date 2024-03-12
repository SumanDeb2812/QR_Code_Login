<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', function () { return view('welcome'); });

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/registration', [RegistrationController::class, 'index']);
Route::post('/registration', [RegistrationController::class, 'registration'])->name('registration');

Route::middleware('login')->group(function(){

    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/dashboard', function () { return view('dashboard'); });

    Route::get('/sendqrmail', [RegistrationController::class, 'sendMail']);

});

