<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\TipoDonacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//>Tecnic rute's 
/*
Route::get('/tecnic', function(){
    return view('tecnico.index');
});
Route::get('tecnic/create', [TecnicoController::class,'create']);
*/
Route::resource('tecnic', TecnicoController::class);
Route::resource('typeDonation', TipoDonacionController::class);