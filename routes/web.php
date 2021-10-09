<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\TipoDonacionController;

=======
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\CharlaController;
use App\Http\Controllers\DetalleDonacionController;
use App\Http\Controllers\DetalleEntregaDonacionController;
use App\Http\Controllers\DetalleRecepcionTecnicoController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\DistribuidorController;
use App\Http\Controllers\DonanteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\TecnicoController;
>>>>>>> develop
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
<<<<<<< HEAD
//>Tecnic rute's 
/*
Route::get('/tecnic', function(){
    return view('tecnico.index');
});
Route::get('tecnic/create', [TecnicoController::class,'create']);
*/
Route::resource('tecnic', TecnicoController::class);
Route::resource('typeDonation', TipoDonacionController::class);
=======

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Rutas de Donante
Route::get('/donante/dashboard', [DonanteController::class, 'vista'])->middleware(['auth'])->name('donante_dashboard');

//Rutas de Beneficiario
Route::get('/beneficiario/dashboard',[BeneficiarioController::class, 'vista'])->middleware(['auth'])->name('beneficiario_dashboard');

//Rutas de Distribuidor
Route::get('/distribuidor/dashboard', [DistribuidorController::class, 'vista'])->middleware(['auth'])->name('distribuidor_dashboard');

//Rutas de Tecnico
Route::get('/tecnico/dashboard', [TecnicoController::class, 'vista'])->middleware(['auth'])->name('tecnico_dashboard');

//Rutas de Administrador
Route::get('/administrador/dashboard', [AdministradorController::class, 'vista'])->middleware(['auth'])->name('administrador_dashboard');

require __DIR__.'/auth.php';
>>>>>>> develop
