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
Route::post('/logout',[UserController::class,'logout'])->name('logout.user');
Route::post('/addComment',[MessageController::class,'addComment'])->name('add.comment');
Route::post('/delComment/{id}',[MessageController::class,'delComment'])->name('del.comment');
Route::post('/upComment/{id}',[MessageController::class,'upComment'])->name('up.comment');
Route::post('/downComment/{id}',[MessageController::class,'downComment'])->name('down.comment');
Route::post("/changePassword",[UserController::class,'changePass'])->name('change.passwordPost');
Route::get("/changePassword",[UserController::class,'showChangePass'])->name('change.passwordGet');
