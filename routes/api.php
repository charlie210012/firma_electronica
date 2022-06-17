<?php

use App\Http\Controllers\API\AuthController;
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

Route::post('/sign', [SignController::class, 'store'])->middleware('client');

// Route::post('/login', [AuthController::class, 'login']);

// Route::post('/business',[TenantController::class,'create']);

// Route::post('/business/auth',[TenantController::class,'login']);

// Route::get('/sign', [firmaController::class, 'index'])->middleware('auth:api'); //aun no se usa



// Route::post('/confirmar',[firmaController::class, 'confirm'])->middleware('auth:api');
