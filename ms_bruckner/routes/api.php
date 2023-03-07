<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadesController as Unidades;

use App\Http\Controllers\UnidadTiposController as UnidadTipos;
use App\Http\Controllers\UnidadMarcasController as UnidadMarcas;

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


/*
Route::get('/unidades', function () {
    echo "perrurry";    
    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA',
    ]);
    php artisan make:controller unidadesController --api
});
*/

