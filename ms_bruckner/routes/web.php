<?php

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


Route::get('/', function () {
    return view('welcome');
});

// Clear application cache:
Route::get('/borrar-cache', function() {
    Artisan::call('cache:clear');
	Artisan::call('route:cache');
 	Artisan::call('config:cache');
    Artisan::call('view:clear');

    echo "cache eliminada";
});
