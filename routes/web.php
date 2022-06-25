<?php

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/single/{id}', [App\Http\Controllers\SingleAM::class, 'index']);
Route::get('/anime-list', [App\Http\Controllers\ListAM::class, 'list_anime']);
Route::get('/manga-list', [App\Http\Controllers\ListAM::class, 'list_manga']);
