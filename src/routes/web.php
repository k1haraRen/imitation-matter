<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

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

Route::get('/register', [UserController::class, 'register']);
Route::get('/first', [UserController::class, 'first']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/mail', [UserController::class, 'mail']);

Route::get('/', [ItemController::class, 'index']);
Route::get('/mypage', [ItemController::class, 'mypage']);
Route::get('/edit', [ItemController::class, 'edit']);
Route::get('/sell', [ItemController::class, 'sell']);
Route::get('/item', [ItemController::class, 'detail']);
Route::get('/purchase', [ItemController::class, 'purchase']);