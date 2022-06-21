<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BusinessController;
use App\Http\Controllers\API\SignController;
use App\Http\Controllers\API\TenantController;
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

Route::post('/user',[AuthController::class,'create'])->middleware('client');

Route::get('/users/{business_id}',[AuthController::class,'index'])->middleware('client');

Route::post('/sign', [SignController::class, 'store'])->middleware('client');

Route::post('/business', [BusinessController::class, 'create'])->middleware('client');

Route::get('/business', [BusinessController::class, 'index'])->middleware('client');
