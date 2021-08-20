<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteApiController;
use App\Http\Controllers\AuthController;

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

//Route::resource('clientes', \App\Http\Controllers\ClienteApiController::class);

//Rutas publicas
Route::post('/registrar', [AuthController::class, 'registrar']);
Route::get('/clientes', [ClienteApiController::class, 'index']);
Route::get('/clientes/{id}', [ClienteApiController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);


//Rutas privadas
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/clientes', [ClienteApiController::class, 'store']);
    Route::put('/clientes/{id}', [ClienteApiController::class, 'update']);
    Route::delete('/clientes/{id}', [ClienteApiController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
