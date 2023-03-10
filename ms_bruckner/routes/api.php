<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadesController as Unidades;

use App\Http\Controllers\UnidadTiposController as UnidadTipos;
use App\Http\Controllers\UnidadMarcasController as UnidadMarcas;

use App\Http\Controllers\ServiciosController as Servicio;
use App\Http\Controllers\ServicioCategoriasController as ServicioCategorias;
use App\Http\Controllers\ServicioPasosController as ServicioPasos;

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

Route::apiResource( '/unidades', Unidades::class);
Route::apiResource( '/unidad-tipos', UnidadTipos::class );
Route::apiResource( '/unidad-marcas', UnidadMarcas::class );

Route::apiResource( '/servicios', Servicio::class);
Route::apiResource( '/servicio-categorias', ServicioCategorias::class);
Route::apiResource( '/servicio-pasos', ServicioPasos::class);
