<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\UserList;

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
Route::get('/home', function () {
    return redirect('/');
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/single/{id}', [App\Http\Controllers\SingleAM::class, 'index']);
Route::get('/anime-list', [App\Http\Controllers\ListAM::class, 'list_anime']);
Route::get('/manga-list', [App\Http\Controllers\ListAM::class, 'list_manga']);
Route::get('/my-list', [App\Http\Controllers\ListAM::class, 'my_list']);

Route::post('/addList', [App\Http\Controllers\UserList::class, 'add_to_list']);
Route::post('/removeList', [App\Http\Controllers\UserList::class, 'remove_list']);
Route::post('/editList', [App\Http\Controllers\UserList::class, 'edit_list']);
