<?php

use App\Http\Controllers\ApiSeriesController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store')->name('sign');
    Route::get('/logout', 'destroy')->name('logout');
});

Route::controller(UsersController::class)->group(function() {
    Route::get('/registrar', 'create')->name('users.create');
    Route::post('/registrar', 'store')->name('create');
});

Route::middleware(\App\Http\Middleware\Autenticador::class)->group(function() {

    Route::get('/', [SeriesController::class, 'index']);

    Route::controller(EpisodesController::class)->group(function() {
        Route::get('/series/{season}/episodes', 'index')->name('episodes.index');
        Route::post('/series/{season}/episodes', 'update')->name('episodes.update');
    });

    Route::controller(SeasonsController::class)->group(function() {
        Route::get('/series/{series}/seasons', 'index')->name('seasons.index');
    });

    Route::controller(SeriesController::class)->group(function() {
        Route::get('/series', 'index')->name('series.index');
        Route::get('/series/criar', 'create')->name('series.create');
        Route::post('/series/salvar', 'store')->name('series.store');
        Route::get('/series/{series}/editar', 'edit')->name('series.edit');
        Route::put('/series/{series}', 'update')->name('series.update');
        Route::delete('/series/destroy/{serie}', 'destroy')->name('series.destroy');
    });
});

Route::prefix('api')->group(function () {
    Route::controller(ApiSeriesController::class)->group(function() {
        Route::get('/series/{series}/seasons', 'findSeriesPerSeason');
        Route::get('/series/{series}/episodes', 'findSeriesPerEpisodes');
        Route::get('/series', 'index');
        Route::get('/series/{series}', 'show');
        Route::put('/series/{series}', 'update')->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
        Route::delete('/series/{series}', 'destroy')->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
        Route::post('/series', 'store')->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]); 
        Route::patch('/episodes/{episode}', function (\App\Models\Episode $episode, Request $request) {
            $episode->watched = $request->watched;
            $episode->save();
        
            return $episode;
        });
    });
});