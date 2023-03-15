<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;

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
    return view('home');
});

Route::get('/carte', function () {
    return view('carte');
});

//------------CONNECTION/DECONNECTION/INSCRIPTION-----------

// Show Register/ Create Form
Route::get('/register', [UserController::class, 'create']);

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout']);

// Show Login Form
Route::get('/login', [UserController::class, 'login']);

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// -----------RESERVATION-------------------------------------

Route::get('/reservation', [ScheduleController::class, 'index']);
Route::get('/reservation/newdate', [ScheduleController::class, 'newdate']);

