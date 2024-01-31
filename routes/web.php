<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Http\Request;
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
    return redirect('/series');
});

Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route:: get('/series/{series}/seasons', [\App\Http\Controllers\SeasonsController::class, 'index'])
->name('seasons.index');

Route:: get('/seasons/{season}/episodes', [\App\Http\Controllers\EpisodesController::class, 'index'])
->name('episodes.index');

Route:: post('/seasons/{season}/episodes', [\App\Http\Controllers\EpisodesController::class, 'update'])
->name('episodes.update');



  