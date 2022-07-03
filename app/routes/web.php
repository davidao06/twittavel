<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

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

Route::get('/', [UserController::class,'login'])->name('main.page');
Route::post('/auth', [UserController::class,'auth'])->name('auth.user');
Route::get('/logout',[UserController::class,'logout'])->name('logout.user');
Route::post('/',[MessageController::class,'addComment'])->name('add.comment');
