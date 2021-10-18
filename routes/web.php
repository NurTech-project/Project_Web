<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TecnicoController;
//use App\Http\Controllers\TipoDonacionController;

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
//>Tecnic rute's 
/*
Route::get('/tecnic', function(){
    return view('tecnico.index');
});
Route::get('tecnic/create', [TecnicoController::class,'create']);
*/
;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Rutas de Donante
Route::get('/donante/dashboard', [DonanteController::class, 'vista'])->middleware(['auth'])->name('donante_dashboard');


//Rutas de Beneficiario
Route::get('/beneficiario/dashboard',[BeneficiarioController::class, 'vista'])->middleware(['auth'])->name('beneficiario_dashboard');

//Rutas de Distribuidor
Route::get('/distribuidor/dashboard', [DistribuidorController::class, 'vista'])->middleware(['auth'])->name('distribuidor_dashboard');
Route::get('/distribuidor/create/equipo/{id}', [DistribuidorController::class, 'equipoCreate'])->middleware(['auth'])->name('distribuidor_equipo_create');
Route::post('/distribuidor/create/equipo', [DistribuidorController::class, 'equipoStore'])->middleware(['auth'])->name('distribuidor_equipo_post');
Route::get('/distribuidor/edit/equipo/{id}', [DistribuidorController::class, 'equipoShow'])->middleware(['auth'])->name('distribuidor_equipo_show');
Route::put('/distribuidor/edit/equipo/{id}', [DistribuidorController::class, 'equipoEdit'])->middleware(['auth'])->name('distribuidor_equipo_edit');


Route::get('/distribuidor/create/pieza/{id}', [DistribuidorController::class, 'piezaCreate'])->middleware(['auth'])->name('distribuidor_pieza_create');
Route::post('/distribuidor/create/pieza', [DistribuidorController::class, 'piezaStore'])->middleware(['auth'])->name('distribuidor_pieza_post');
Route::get('/distribuidor/edit/pieza/{id}', [DistribuidorController::class, 'piezaShow'])->middleware(['auth'])->name('distribuidor_pieza_show');
Route::put('/distribuidor/edit/pieza/{id}', [DistribuidorController::class, 'piezaEdit'])->middleware(['auth'])->name('distribuidor_pieza_edit');

Route::get('/distribuidor/agenda', [DistribuidorController::class, 'agenda'])->middleware(['auth'])->name('distribuidor_agenda');

Route::get('/distribuidor/create/equipo/agenda/{id}', [DistribuidorController::class, 'agendaEquipoCreate'])->middleware(['auth'])->name('distribuidor_agenda_create_equipo');
Route::get('/distribuidor/create/pieza/agenda/{id}', [DistribuidorController::class, 'agendaPiezaCreate'])->middleware(['auth'])->name('distribuidor_agenda_create_pieza');

Route::post('/distribuidor/create/equipo/agenda', [DistribuidorController::class, 'agendaEquipoStore'])->middleware(['auth'])->name('distribuidor_agenda_post_equipo');
Route::post('/distribuidor/create/pieza/agenda', [DistribuidorController::class, 'agendaPiezaStore'])->middleware(['auth'])->name('distribuidor_agenda_post_pieza');

Route::get('/distribuidor/edit/equipo/agenda/{id}', [DistribuidorController::class, 'agendaEquipoShow'])->middleware(['auth'])->name('distribuidor_agenda_show_equipo');
Route::get('/distribuidor/edit/pieza/agenda/{id}', [DistribuidorController::class, 'agendaPiezaShow'])->middleware(['auth'])->name('distribuidor_agenda_show_pieza');

Route::put('/distribuidor/edit/equipo/agenda/{id}', [DistribuidorController::class, 'agendaEquipoEdit'])->middleware(['auth'])->name('distribuidor_agenda_edit_equipo');
Route::put('/distribuidor/edit/pieza/agenda/{id}', [DistribuidorController::class, 'agendaPiezaEdit'])->middleware(['auth'])->name('distribuidor_agenda_edit_pieza');

Route::delete('/distribuidor/delete/equipo/agenda/{id}', [DistribuidorController::class, 'agendaEquipoDestroy'])->middleware(['auth'])->name('distribuidor_agenda_destroy_equipo');
Route::delete('/distribuidor/delete/pieza/agenda/{id}', [DistribuidorController::class, 'agendaPiezaDestroy'])->middleware(['auth'])->name('distribuidor_agenda_destroy_pieza');


//Rutas de Tecnico
Route::get('/tecnico/dashboard', [TecnicoController::class, 'vista'])->middleware(['auth'])->name('tecnico_dashboard');

//Rutas de Administrador
Route::get('/administrador/dashboard', [AdministradorController::class, 'vista'])->middleware(['auth'])->name('administrador_dashboard');

//Ruta Donación 

Route::resource('/donante', DonanteController::class);
//Ruta equipo
Route::resource('/donante/equipo', EquipoController::class)->middleware(['auth']);
//Ruta pieza
Route::resource('/donante/pieza', PiezaController::class)->middleware(['auth']);
//Ruta Beneficiario
Route::resource('/beneficiario', BeneficiarioController::class)->middleware(['auth']);



require __DIR__.'/auth.php';
