<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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

Route::as('main')->get('/', function () {
    return view('main');
});

Route::as('estate.index')->get('/estate', function () {
    return view('estate');
});

Route::as('login.index')->get('/login', function () {
    return view('login');
});

Route::as('register.index')->get('/register', function () {
    return view('register');
});

Route::as('register.store')->post('/register/store', [RegisterController::class, '__invoke']);
Route::as('login.store')->post('/login/store', [LoginController::class, '__invoke']);
Route::as('logout')->get('/logout', [LogoutController::class, 'logout']);
Route::as('architect.index')->get('architect', function () {
   return view('architect.register');
});
