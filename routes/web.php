<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\PublicacionController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(["auth", "rol:user"])->group(function () {
    Route::get('/registrarPub', [PublicacionController::class, 'create'])->name('regPub');
    Route::post('/registrarPub', [PublicacionController::class, 'store'])->name('regPub');
    Route::get('/publicaciones', [PublicacionController::class, 'index'])->name('indexP');

    Route::get(
        '/publicaciones/reportar/{id}',
        [PublicacionController::class, 'reportar']
    )->name("publicaciones.reportarget");
    Route::post(
        '/publicaciones/reportar',
        [PublicacionController::class, 'saveReporte']
    )->name("publicaciones.reportar");
    Route::get(
        '/publicaciones/reportar/{id}',
        [PublicacionController::class, 'reportar']
    )->name("publicaciones.reportarget");

    Route::get('/loadDepartamentos', [DepartamentoController::class, 'showAll']);
    Route::get('/loadProvincias/{id}', [ProvinciaController::class, 'showAll']);
    Route::get('/loadDistritos/{id}', [DistritoController::class, 'showAll']);
});

Route::middleware(["auth", "rol:admin"])->group(function () {
    Route::get(
        '/publicaciones/reportados',
        [PublicacionController::class, 'showPublicacionesReportadas']
    )->name("publicaciones.reportados");
    Route::get(
        '/publicaciones/ver/{id}',
        [PublicacionController::class, 'showPublicacionReportado']
    )->name("publicaciones.reportado.ver");
    Route::get(
        '/publicaciones/eliminar/{id}',
        [PublicacionController::class, 'destroy']
    )->name("publicaciones.eliminar");
});
