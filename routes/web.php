<?php

use App\Http\Controllers\ArchitectController;
use App\Http\Controllers\ArchitectLoginController;
use App\Http\Controllers\ArchitectRequestController;
use App\Http\Controllers\ArchitectsLogoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

Route::as('architects.register.store')
    ->post('architects/register/store', [ArchitectRequestController::class, 'store']);

Route::as('architects.logout')->get('architects/logout', [ArchitectsLogoutController::class, 'logout']);

Route::middleware(['access'])->as('admin.index')->get('admin', function () {
    return view('admin.index');
});

Route::middleware(['access'])->resource('users', UserController::class);

Route::middleware('access')->get('/architects', [ArchitectController::class, 'index'])->name('admin.architects.index');
Route::middleware('is_admin')->get('/architects/create', [ArchitectController::class, 'create'])->name('admin.architects.create');
Route::middleware('is_admin')->post('/architects', [ArchitectController::class, 'store'])->name('admin.architects.store');
Route::middleware('is_admin')->get('/architects/{architect}', [ArchitectController::class, 'show'])->name('admin.architects.show');
Route::middleware('access')
    ->get('/architects/{architect}/edit', [ArchitectController::class, 'edit'])
    ->name('admin.architects.edit');
Route::middleware('access')
    ->patch('/architects/{architect}', [ArchitectController::class, 'update'])
    ->name('admin.architects.update');
Route::middleware('is_admin')
    ->delete('/architects/{architect}', [ArchitectController::class, 'destroy'])->name('admin.architects.destroy');

Route::middleware('is_admin')->prefix('admin')->as('admin')->resource('region', RegionController::class);
Route::middleware('access')->prefix('admin')->as('admin')->resource('project', ProjectController::class);

Route::as('architect.login.store')->post('architect/login', [ArchitectLoginController::class, 'login']);
Route::as('architect.login.index')->get('architect/login', function () {
   return view('architect.login');
});
