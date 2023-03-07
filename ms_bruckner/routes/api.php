<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UnidadTipos as UnidadTipos;
use App\Http\Controllers\UnidadMarcas as UnidadMarcas;

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

Route::apiResource( '/unidad-tipos', UnidadTipos::class );
Route::apiResource( '/unidad-marcas', UnidadMarcas::class );

