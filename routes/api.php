<?php

use App\Http\Controllers\Api\EstateController;
use App\Http\Controllers\Api\GoodsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('projects', [EstateController::class, 'get']);
Route::get('goods', [GoodsController::class, 'goods']);
Route::post('update/favourites', [GoodsController::class, 'updateFavorite']);
Route::get('check/favourites', [GoodsController::class, 'check']);
