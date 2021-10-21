<?php

use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\Historia;
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
    return view('home.home');
});


Route::get('/home/quienes-somos', function () {
    return view('home.quienes-somos');
});

Route::get('/home/quiero-computador', function () {
    return view('home.quiero-computador');
});

Route::get('/home/ser-voluntario', function () {
    return view('home.ser-voluntario');
});
Route::get('/home/historias', function () {
    return view('home.historias');
});

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

//Rutas de las historias administrador
Route::get('/historia', [HistoriaController::class, 'verHistoriaAdministrador'])->middleware(['auth'])->name('administrador_historia');
//Rutas de las historias visitante
Route::get('/historia/visitante', [HistoriaController::class, 'verHistoriaVisitante'])->middleware(['guest'])->name('visitante_historia');

Route::get('/historia/create', [HistoriaController::class, 'create'])->middleware(['auth'])->name('administrador_crear_historia');
Route::post('/historia/create', [HistoriaController::class, 'store'])->middleware(['auth'])->name('administrador_crear_post_historia');

Route::delete('/historia/delete/{id}', [HistoriaController::class, 'destroy'])->middleware(['auth'])->name('historia_delete');

Route::get('/historia/edit/{id}', [HistoriaController::class, 'edit'])->middleware(['auth'])->name('historia_edit');


Route::put('/historia/edit/{id}', [HistoriaController::class, 'update'])->middleware(['auth'])->name('historia_update');
//Route::resource('/historia', HistoriaController::class);

//rutas charlas 
Route::get('/charla', [CharlaController::class, 'verCharlaAdministrador'])->middleware(['auth'])->name('administrador_charla');

Route::get('/charla/visitante', [CharlaController::class, 'verCharlaVisitante'])->middleware(['guest'])->name('visitante_charla');

Route::get('/charla/create', [CharlaController::class, 'create'])->middleware(['auth'])->name('administrador_crear_charla');
Route::post('/charla/create', [CharlaController::class, 'store'])->middleware(['auth'])->name('administrador_crear_post_charla');

Route::delete('/charla/delete/{id}', [CharlaController::class, 'destroy'])->middleware(['auth'])->name('charla_delete');

Route::get('/charla/edit/{id}', [CharlaController::class, 'edit'])->middleware(['auth'])->name('charla_edit');


Route::put('/charla/edit/{id}', [CharlaController::class, 'update'])->middleware(['auth'])->name('charla_update');