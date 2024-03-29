<?php
//header('Access-Control-Allow-Origin: *');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadesController as Unidades;

use App\Http\Controllers\UnidadTiposController as UnidadTipos;
use App\Http\Controllers\UnidadMarcasController as UnidadMarcas;

use App\Http\Controllers\ServiciosController as Servicio;
use App\Http\Controllers\ServicioCategoriasController as ServicioCategorias;
use App\Http\Controllers\ServicioPasosController as ServicioPasos; 
use App\Http\Controllers\ServicioSeguimientosController as ServicioSeguimiento;
use App\Http\Controllers\ServicioSolicitudController as ServicioSolicitud;
use App\Http\Controllers\OperadoresController as Operadores; 


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


Route::group([
    //'middleware' => ['cors']
], function () {

	Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	    return $request->user();
	});

	Route::apiResource( '/unidades', Unidades::class);
	Route::apiResource( '/unidad-tipos', UnidadTipos::class );
	Route::apiResource( '/unidad-marcas', UnidadMarcas::class );

	Route::apiResource( '/servicios', Servicio::class);
	Route::apiResource( '/servicio-categorias', ServicioCategorias::class); //Categorías de Servicio
	Route::apiResource( '/servicio-pasos', ServicioPasos::class); //Paos del servicio
	Route::apiResource( '/servicio-seguimientos', ServicioSeguimiento::class); //Historial de los servicios
    Route::apiResource( '/servicio-solicitudes', ServicioSolicitud::class); //Solicitud de los servicios (antes identificador)

	Route::apiResource( '/operadores', Operadores::class);
	//Route::put( '/operadores/{id}/asignar-unidad', [Operadores::class,'asignarUnidad']);

});