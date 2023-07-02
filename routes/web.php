<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BookTableController;

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

//------------CONNEXION/DECONNECTION/INSCRIPTION-----------

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

Route::get('/reservation/{selectedDate}', [ScheduleController::class, 'newdate']);

Route::post('/booktable', [BookTableController::class, 'store']);

// -----------ADMIN-------------------------------------------

Route::get('/dashboard', [AdminController::class, 'index']);

Route::get('/dashboard/newdate', [AdminController::class, 'newdate']);

Route::post('/dashboard/delete', [AdminController::class, 'delete']);

Route::get('/schedule', [AdminController::class, 'schedule']);

