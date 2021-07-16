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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/allUsers',[App\Http\Controllers\AllUsersController::class, 'index'])->name('allUsers');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\QuestionsController::class, 'add'])->name('newQuestion');
Route::post('/create', [App\Http\Controllers\ReponsesController::class, 'create'])->name('newResponse');
Route::post('/delete', [App\Http\Controllers\ReponsesController::class, 'delete'])->name('deleteResponse');

Route::get('deleteuser/{id}',[App\Http\Controllers\AllUsersController::class, 'delete'])->name('deleteUser');
Route::get('restoreUser/{id}',[App\Http\Controllers\AllUsersController::class, 'restore'])->name('restoreUser');
// Route::get('getComment/{id}',[App\Http\Controllers\ReponsesController::class, 'getAll'])->name('getComment');
Route::post('/deleteQuestion', [App\Http\Controllers\QuestionsController::class, 'delete'])->name('deleteQuestion');



