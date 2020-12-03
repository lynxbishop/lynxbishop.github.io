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

Route::get('/',[\App\Http\Controllers\TodoController::class,'index'])->name('home');
Route::get('/index1',[\App\Http\Controllers\TodoController::class,'index1'])->name('first');
Route::get('/index2',[\App\Http\Controllers\TodoController::class,'index2'])->name('second');
Route::get('/index3',[\App\Http\Controllers\TodoController::class,'index3'])->name('third');
Route::get('/api',[\App\Http\Controllers\TodoController::class,'api'])->name('api');

