<?php

use App\Http\Controllers\NetFlixApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/get-recent-movies',[NetFlixApiController::class,'getRecentMovies']);

Route::post('/get-movie-action',[NetFlixApiController::class,'getMovieAction']);
Route::post('/get-movie-horror',[NetFlixApiController::class,'getMovieHorror']);
Route::post('/get-movie-comedy',[NetFlixApiController::class,'getMovieComedy']);
Route::post('/get-movie-romance',[NetFlixApiController::class,'getMovieRomance']);


Route::post('/get-movie-toggle',[NetFlixApiController::class,'getMovieToggle']);



