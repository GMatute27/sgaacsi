<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DimensionController;
use App\Http\Controllers\AmbitosController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view(uri: '/',view: 'login')->name('login');
Route::view(uri: '/home',view: 'index')->name('home');
Route::resource(name: '/autoevaluacion', controller: DimensionController::class);

Route::view(uri: '/indicador',view: 'indicador')->name('indicador');
Auth::routes();