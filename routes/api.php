<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\firmaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/firmar', [firmaController::class, 'index'])->middleware('auth:api');

Route::post('/firmar', [firmaController::class, 'store'])->middleware('auth:api');

Route::post('/confirmar',[firmaController::class, 'confirm'])->middleware('auth:api');
