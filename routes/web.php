<?php

 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DimensionController;
use App\Http\Controllers\AmbitosController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\ComentariosController;

Route::get('/', function () {
    return view('auth.login');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('/autoevaluacion', controller: DimensionController::class)->middleware('auth');

Route::view(uri: '/indicador',view: 'indicador')->name('indicador')->middleware('auth');
Route::resource(name: '/evidencias', controller: RespuestaController::class)->middleware('auth');
Route::resource(name: '/resultado', controller: ResultadoController::class)->middleware('auth');
Route::get('/resumen', [App\Http\Controllers\DimensionController::class, 'resumen'])->name('resumen')->middleware('auth');
Route::get('/resumen/{index}', [App\Http\Controllers\DimensionController::class, 'resumenfaci'])->name('resumen')->middleware('auth');
Route::get('/autoevaluacion/facilitador/{index}', [App\Http\Controllers\DimensionController::class, 'indexfaci'])->name('autoevaluacion')->middleware('auth');
Route::get('/resultadosaprendizaje', [App\Http\Controllers\ResultadoController::class, 'indexapre'])->name('resultadoaprendizaje')->middleware('auth');
Route::get('/resultadosaprendizaje/{idc}', [App\Http\Controllers\ResultadoController::class, 'indexaprefac'])->name('resultadoaprendizaje')->middleware('auth');
Route::post('/resultadoapre', [App\Http\Controllers\ResultadoController::class, 'resul'])->name('resultadoaprendizaje')->middleware('auth');
Route::resource('/comentarios', controller: ComentariosController::class)->middleware('auth');
Route::get('/evidencias/{respuesta}/{colegio}', [App\Http\Controllers\RespuestaController::class, 'showfac'])->name('evidencias')->middleware('auth');
Auth::routes();