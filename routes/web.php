<?php

use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SeriesController::class, 'index']);

Route::controller(SeriesController::class)->group(function() {
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/criar', 'create')->name('series.create');
    Route::post('/series/salvar', 'store')->name('series.store');
    Route::get('/series/{series}/editar', 'edit')->name('series.edit');
    Route::put('/series/{series}', 'update')->name('series.update');
    Route::delete('/series/destroy/{serie}', 'destroy')->name('series.destroy');
});

Route::controller(SeasonsController::class)->group(function() {
    Route::get('/series/{series}/seasons', 'index')->name('seasons.index');
});
