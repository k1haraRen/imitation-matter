<?php

use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group(function () {
    Route::get('/first_login', [UserController::class, 'firstLoginForm'])->name('first_login.form');
    Route::post('/first_login', [UserController::class, 'store'])->name('first_login.store');

    // トップページ（ログイン後の通常画面）
    Route::get('/', [ItemController::class, 'index'])->name('home');
});
Route::get('/first', [UserController::class, 'first']);
Route::get('/mail', [UserController::class, 'mail']);

Route::get('/', [ItemController::class, 'index']);
Route::get('/item/{id}', [ItemController::class, 'detail'])->name('detail');
Route::get('/mypage', [ItemController::class, 'mypage']);
Route::get('/edit', [ItemController::class, 'edit']);
Route::get('/sell', [ItemController::class, 'sell']);
Route::get('/purchase', [ItemController::class, 'purchase']);