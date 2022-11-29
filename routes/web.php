<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimcardController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\SimcardsAsignadasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PuntoVentaController;
use App\Http\Controllers\RedeController;
use App\Http\Controllers\ConsumoController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\DispositivoAsignadoController;
use App\Http\Controllers\TipoDispositivoController;
use App\Http\Controllers\SimcardsAsignadaController;
use App\Http\Controllers\KashController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kash', [App\Http\Controllers\KashController::class, 'index']);


Route::resource('consumos',App\Http\Controllers\ConsumoController::class)->middleware('can:admin');

Route::get('consumo/consulta',[ConsumoController::class,'consulta'])->name('consumos.consulta')->middleware('can:tecniBodeAdminInve');

Route::get('consumo/exportar',[ConsumoController::class,'exportar'])->name('consumos.exportar')->middleware('can:admin');

Route::post('consumo/importar',[ConsumoController::class,'importar'])->name('consumos.importar')->middleware('can:admin');



Route::resource('redes',App\Http\Controllers\RedeController::class)->middleware('can:admin');

Route::get('rede/consulta',[RedeController::class,'consulta'])->name('redes.consulta')->middleware('can:tecniBodeAdminInve');

Route::get('rede/exportar',[RedeController::class,'exportar'])->name('redes.exportar')->middleware('can:admin');

Route::post('rede/importar',[RedeController::class,'importar'])->name('redes.importar')->middleware('can:admin');


Route::resource('punto-ventas',App\Http\Controllers\PuntoVentaController::class)->middleware('can:admin');

Route::get('punto-venta/consulta',[PuntoVentaController::class,'consulta'])->name('punto-ventas.consulta')->middleware('can:tecniBodeAdminInve');

Route::get('punto-venta/exportar',[PuntoVentaController::class,'exportar'])->name('punto-ventas.exportar')->middleware('can:admin');

Route::post('punto-venta/importar',[PuntoVentaController::class,'importar'])->name('punto-ventas.importar')->middleware('can:admin');



Route::resource('simcards',App\Http\Controllers\SimcardController::class)->middleware('can:admin');

Route::get('simcard/consulta',[SimcardController::class,'consulta'])->name('simcards.consulta')->middleware('can:tecniBodeAdminInve');

Route::get('simcard/consulta/user',[SimcardController::class,'consultaUser'])->name('simcards.consulta.user')->middleware('can:tecniBodeAdminInve');

Route::get('simcard/exportar',[SimcardController::class,'exportar'])->name('simcards.exportar')->middleware('can:admin');

Route::post('simcard/importar',[SimcardController::class,'importar'])->name('simcards.importar')->middleware('can:admin');



Route::get('estado',[SimcardsAsignadaController::class,'estado'])->name('estado')->middleware('can:bodeAdmin');

Route::post('estado/estadobodega',[SimcardsAsignadaController::class,'estadobodega'])->name('estadobodega')->middleware('can:bodeAdmin');

Route::get('intercambio',[SimcardsAsignadaController::class,'intercambioindex'])->name('simcard.intercambioindex')->middleware('can:tecnico');

Route::get('intercambio/{simcards_asignada}/edit',[SimcardsAsignadaController::class,'intercambioedit'])->name('simcard.intercambioedit')->middleware('can:tecnico');

Route::put('intercambio/{simcards_asignada}',[SimcardsAsignadaController::class,'intercambioupdate'])->name('simcard.intercambioupdate')->middleware('can:tecnico');

Route::get('asignar/bodega',[SimcardsAsignadaController::class,'asignarBodega'])->name('asignar.bodega')->middleware('can:admin');

Route::post('asignar/bodega/asignado',[SimcardsAsignadaController::class,'asignadoBodega'])->name('asignar.bodega.asignado')->middleware('can:admin');

Route::resource('simcards-asignadas',App\Http\Controllers\SimcardsAsignadaController::class)->middleware('can:tecniadmin');

Route::get('simcards-asignada/exportar',[SimcardsAsignadaController::class,'exportar'])->name('simcards-asignadas.exportar')->middleware('can:admin');



Route::resource('bodegas',App\Http\Controllers\BodegaController::class)->middleware('can:bodega');

Route::resource('tecnicos',App\Http\Controllers\TecnicoController::class)->middleware('can:tecnico');



Route::resource('users',App\Http\Controllers\UserController::class)->middleware('can:admin');

Route::get('user/{user}/edit',[UserController::class,'password'])->name('users.password.edit')->middleware('can:admin');

Route::put('user/{user}',[UserController::class,'passwordUpdate'])->name('users.password')->middleware('can:admin');

Route::patch('user/{user}',[UserController::class,'passwordUpdate'])->name('users.password')->middleware('can:admin');




Route::resource('dispositivos',App\Http\Controllers\DispositivoController::class);

Route::get('dispositivo/consulta',[DispositivoController::class,'consulta'])->name('dispositivos.consulta')->middleware('can:tecniBodeAdminInve');

Route::get('dispositivo/exportar',[DispositivoController::class,'exportar'])->name('dispositivos.exportar')->middleware('can:invenBode');

Route::post('dispositivo/importar',[DispositivoController::class,'importar'])->name('dispositivos.importar')->middleware('can:invenBode');


Route::patch('dispositivo/{dispositivo}',[DispositivoAsignadoController::class,'updateuser'])->name('dispositivos.updateuser')->middleware('can:invenBode');

Route::get('dispositivo/{dispositivo}/edituser',[DispositivoAsignadoController::class,'edituser'])->name('dispositivos.edituser')->middleware('can:invenBode');

Route::get('dispositivo/estado',[DispositivoAsignadoController::class,'estado'])->name('dispositivos.estado')->middleware('can:invenBode');

Route::post('dispositivo/asignado',[DispositivoAsignadoController::class,'asignadoDispositivo'])->name('dispositivos.asignado')->middleware('can:invenBode');

Route::get('dispositivo/acta/entrada',[DispositivoAsignadoController::class,'activoEntrada'])->name('dispositivos.entrada')->middleware('can:tecnico');

Route::get('dispositivo/acta/salida',[DispositivoAsignadoController::class,'activoSalida'])->name('dispositivos.salida')->middleware('can:tecnico');

Route::post('dispositivo/acta/entrada/asignado',[DispositivoAsignadoController::class,'activoEntradaAsignado'])->name('dispositivos.activoentradaasignado')->middleware('can:tecnico');

Route::post('dispositivo/acta/salida/asignado',[DispositivoAsignadoController::class,'activoSalidaAsignado'])->name('dispositivos.activosalidaasignado')->middleware('can:tecnico');

Route::get('dispositivo/intercambioindex',[DispositivoAsignadoController::class,'intercambioindex'])->name('dispositivos.intercambioindex')->middleware('can:tecnico');

Route::get('dispositivo/intercambio/{dispositivo}/edit',[DispositivoAsignadoController::class,'intercambioedit'])->name('dispositivos.intercambio.edit')->middleware('can:tecnico');

Route::put('dispositivo/intercambio/{dispositivo}',[DispositivoAsignadoController::class,'intercambioupdate'])->name('dispositivos.intercambio.update')->middleware('can:tecnico');


Route::resource('dispositivo-asignados',App\Http\Controllers\DispositivoAsignadoController::class);
