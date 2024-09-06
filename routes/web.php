<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store')->name('sign');
    Route::get('/logout', 'destroy')->name('logout');
});

Route::controller(UsersController::class)->group(function() {
    Route::get('/registrar', 'create')->name('users.create');
    Route::post('/registrar', 'store')->name('create');
});

Route::get('/', [SeriesController::class, 'index'])->middleware(Autenticador::class);

Route::controller(SeriesController::class)->group(function() {
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/criar', 'create')->name('series.create');
    Route::post('/series/salvar', 'store')->name('series.store');
    Route::get('/series/{series}/editar', 'edit')->name('series.edit');
    Route::put('/series/{series}', 'update')->name('series.update');
    Route::delete('/series/destroy/{serie}', 'destroy')->name('series.destroy');
})->middleware(Autenticador::class);

Route::controller(SeasonsController::class)->group(function() {
    Route::get('/series/{series}/seasons', 'index')->name('seasons.index');
})->middleware(Autenticador::class);

Route::controller(EpisodesController::class)->group(function() {
    Route::get('/series/{season}/episodes', 'index')->name('episodes.index');
    Route::post('/series/{season}/episodes', 'update')->name('episodes.update');
})->middleware(Autenticador::class);