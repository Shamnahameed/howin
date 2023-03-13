<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RecentController;
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

Route::get('/',  [HomeController::class, 'viewHome']);
Route::get('/Recent',[RecentController::class,'viewRecent'])->name('admin.viewRecent');
Route::post('/add-Recent',[RecentController::class,'addRecent'])->name('admin.addRecent');
Route::post('/update-Recent',[RecentController::class,'updateRecent'])->name('admin.updateRecent');
Route::get('/delete-recent/{id}',[RecentController::class,'deleteRecent'])->name('admin.deleteRecent');

Route::get('/Movie',[MovieController::class,'viewMovie'])->name('admin.viewMovie');
Route::post('/add-movie',[MovieController::class,'addMovie'])->name('admin.addMovie');
Route::post('/update-movie',[MovieController::class,'updateMovie'])->name('admin.updateMovie');
Route::get('/delete-movie/{id}',[MovieController::class,'deleteMovie'])->name('admin.deleteMovie');
Route::get('/toggle-movie/{id}',[MovieController::class,'togglemovie'])->name('admin.togglemovie');


