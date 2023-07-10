<?php

use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\IncidenciasController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\AreasController;

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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {  
    Route::resource('incidencias', IncidenciasController::class);
    Route::resource('usuarios', UserController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('equipos',EquiposController::class);
    Route::resource('proveedores',ProveedorController::class);
    Route::resource('cargos',CargosController::class);
    Route::resource('notificaciones',NotificacionesController::class);
    Route::resource('areas',AreasController::class);
    //archivos
    Route::get('descargarArchivo/{id}',[ArchivoController::class,'descargarArchivo']);
    Route::get('verArchivo/{id}',[ArchivoController::class,'verArchivo']);
    Route::delete('eliminarArchivo/{id}',[ArchivoController::class,'eliminarArchivo'])->name('eliminar_archivo');
    
});


