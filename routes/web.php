<?php

use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Api\EstateController;
use App\Http\Controllers\ArchitectController;
use App\Http\Controllers\ArchitectLoginController;
use App\Http\Controllers\ArchitectRequestController;
use App\Http\Controllers\ArchitectsLogoutController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
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

Route::as('login.index')->get('/login', function () {
    return view('login');
});

Route::as('register.index')->get('/register', function () {
    return view('register');
});

Route::as('register.store')->post('/register/store', [RegisterController::class, '__invoke']);
Route::as('login.store')->post('/login/store', [LoginController::class, '__invoke']);
Route::as('logout')->get('/logout', [LogoutController::class, 'logout']);

Route::as('architect.register')->get('architect', function () {
    return view('architect.register');
});

Route::as('architects.register.store')
    ->post('architects/register/store', [ArchitectRequestController::class, 'store']);

Route::as('architects.logout')->get('architects/logout', [ArchitectsLogoutController::class, 'logout']);

Route::middleware(['access'])->as('admin.index')->get('admin', function () {
    return view('admin.index');
});

Route::middleware(['access'])->resource('users', UserController::class);

Route::middleware('access')->get('/architects', [\App\Http\Controllers\Admin\ArchitectController::class, 'index'])->name('admin.architects.index');
Route::middleware('is_admin')->get('/architects/create', [\App\Http\Controllers\Admin\ArchitectController::class, 'create'])->name('admin.architects.create');
Route::middleware('is_admin')->post('/architects', [\App\Http\Controllers\Admin\ArchitectController::class, 'store'])->name('admin.architects.store');
Route::middleware('is_admin')->get('/architects/{architect}', [\App\Http\Controllers\Admin\ArchitectController::class, 'show'])->name('admin.architects.show');
Route::middleware('access')
    ->get('/architects/{architect}/edit', [\App\Http\Controllers\Admin\ArchitectController::class, 'edit'])
    ->name('admin.architects.edit');
Route::middleware('access')
    ->patch('/architects/{architect}', [\App\Http\Controllers\Admin\ArchitectController::class, 'update'])
    ->name('admin.architects.update');
Route::middleware('is_admin')
    ->delete('/architects/{architect}', [\App\Http\Controllers\Admin\ArchitectController::class, 'destroy'])->name('admin.architects.destroy');

Route::middleware('is_admin')->prefix('admin')->as('admin')->resource('region', RegionController::class);
Route::middleware('access')->prefix('admin')->as('admin')->resource('project', ProjectController::class);

Route::as('architect.login.store')->post('architect/login', [ArchitectLoginController::class, 'login']);
Route::as('architect.login.index')->get('architect/login', function () {
    return view('architect.login');
});

Route::as('goods.')->prefix('goods')->controller(GoodsController::class)->group(function () {
    Route::get('{id}', 'view')->name('view');
    Route::get('/', 'index')->name('index');
});

Route::middleware('is_admin')->group(function () {
    Route::resource('property', PropertyController::class);
});

Route::as('agent.')
    ->prefix('agent')
    ->controller(AgentController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });

Route::as('estate.')
    ->prefix('estate')
    ->controller(EstateController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'view')->name('view');
    });

Route::as('admin.')->prefix('admin')->group(function (){
   Route::resource('admin/estate', \App\Http\Controllers\Admin\EstateController::class)->except('show');
});

Route::get('favourite', [FavouriteController::class, 'index'])->name('favourite.index');

Route::resource('architect', ArchitectController::class);

Route::as('review.')->prefix('review')->controller(ReviewController::class)->group(function (){
   Route::as('store')->post('/', 'store');
});
