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
Route::get('tecnic/create', [TecnicoController::class,'create']);

;

Route::get('/home/quienes-somos', function () {
    return view('home.quienes-somos');
});

Route::get('/home/quiero-computador', function () {
    return view('home.quiero-computador');
});

Route::get('/home/ser-voluntario', function () {
    return view('home.ser-voluntario');
});

Route::get('/home/quienes-somos', function () {
    return view('home.quienes-somos');
});






//Rutas de Donante
Route::get('/donante/dashboard', [DonanteController::class, 'vista'])->middleware(['auth'])->name('donante_dashboard');


//Rutas de Beneficiario
Route::get('/beneficiario/dashboard',[BeneficiarioController::class, 'vista'])->middleware(['auth'])->name('beneficiario_dashboard');

//Rutas de Distribuidor
Route::get('/distribuidor/perfil/{distribuidor}', [DistribuidorController::class, 'perfilDistribuidor'])->middleware(['auth'])->name('distribuidor_perfil');
Route::get('/distribuidor/edit/perfil/{distribuidor}', [DistribuidorController::class, 'editPerfilDistribuidor'])->middleware(['auth'])->name('distribuidor_perfil_edit');
Route::patch('/distribuidor/perfil/{distribuidor}/edit', [DistribuidorController::class, 'updateDescripcionDistribuidor'])->middleware(['auth'])->name('distribuidor_perfil_put');

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

Route::get('/tecnico/recibir/equipo/{id}', [TecnicoController::class, 'equipoCreate'])->middleware(['auth'])->name('tecnico_equipo_create');
Route::put('/tecnico/recibir/equipo/{id}', [TecnicoController::class, 'equipoStore'])->middleware(['auth'])->name('tecnico_equipo_post');
Route::get('/tecnico/edit/equipo/{id}', [TecnicoController::class, 'equipoShow'])->middleware(['auth'])->name('tecnico_equipo_show');
Route::put('/tecnico/edit/equipo/{id}', [TecnicoController::class, 'equipoEdit'])->middleware(['auth'])->name('tecnico_equipo_edit');


Route::get('/tecnico/recibir/pieza/{id}', [TecnicoController::class, 'piezaCreate'])->middleware(['auth'])->name('tecnico_pieza_create');
Route::put('/tecnico/recibir/pieza/{id}', [TecnicoController::class, 'piezaStore'])->middleware(['auth'])->name('tecnico_pieza_post');
Route::get('/tecnico/edit/pieza/{id}', [TecnicoController::class, 'piezaShow'])->middleware(['auth'])->name('tecnico_pieza_show');
Route::put('/tecnico/edit/pieza/{id}', [TecnicoController::class, 'piezaEdit'])->middleware(['auth'])->name('tecnico_pieza_edit');

Route::get('/tecnico/diagnostico', [TecnicoController::class, 'diagnostico'])->middleware(['auth'])->name('tecnico_diagnostico');

Route::get('/tecnico/create/equipo/diagnostico/{id}', [TecnicoController::class, 'diagnosticoEquipoCreate'])->middleware(['auth'])->name('tecnico_diagnostico_create_equipo');
Route::get('/tecnico/create/pieza/diagnostico/{id}', [TecnicoController::class, 'diagnosticoPiezaCreate'])->middleware(['auth'])->name('tecnico_diagnostico_create_pieza');

Route::post('/tecnico/create/equipo/diagnostico', [TecnicoController::class, 'diagnosticoEquipoStore'])->middleware(['auth'])->name('tecnico_diagnostico_post_equipo');
Route::post('/tecnico/create/pieza/diagnostico', [TecnicoController::class, 'diagnosticoPiezaStore'])->middleware(['auth'])->name('tecnico_diagnostico_post_pieza');

Route::get('/tecnico/edit/equipo/diagnostico/{id}', [TecnicoController::class, 'diagnosticoEquipoShow'])->middleware(['auth'])->name('tecnico_diagnostico_show_equipo');
Route::get('/tecnico/edit/pieza/diagnostico/{id}', [TecnicoController::class, 'diagnosticoPiezaShow'])->middleware(['auth'])->name('tecnico_diagnostico_show_pieza');

Route::put('/tecnico/edit/equipo/diagnostico/{id}', [TecnicoController::class, 'diagnosticoEquipoEdit'])->middleware(['auth'])->name('tecnico_diagnostico_edit_equipo');
Route::put('/tecnico/edit/pieza/diagnostico/{id}', [TecnicoController::class, 'diagnosticoPiezaEdit'])->middleware(['auth'])->name('tecnico_diagnostico_edit_pieza');

Route::delete('/tecnico/delete/equipo/diagnostico/{id}', [TecnicoController::class, 'diagnosticoEquipoDestroy'])->middleware(['auth'])->name('tecnico_diagnostico_destroy_equipo');
Route::delete('/tecnico/delete/pieza/diagnostico/{id}', [TecnicoController::class, 'diagnosticoPiezaDestroy'])->middleware(['auth'])->name('tecnico_diagnostico_destroy_pieza');

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
//Ruta Tecnico
Route::resource('/tecnico', TecnicoController::class)->middleware(['auth']);



require __DIR__.'/auth.php';
