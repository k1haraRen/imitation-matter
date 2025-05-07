<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;

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

    Route::get('/', [ItemController::class, 'index'])->name('home');
});
Route::get('/first', [UserController::class, 'first']);
Route::get('/mail_check', function () {
    return view('mail_check');
})->middleware('auth');
Route::post('/email/check-verified', function () {
    $user = Auth::user();

    if ($user->hasVerifiedEmail()) {
        return redirect('/first_login');
    }

    return back()->with('error', 'メール認証がまだ完了していません。');
})->middleware(['auth'])->name('email.checkVerified');
Route::get('/mail', [UserController::class, 'mail']);


Route::get('/', [ItemController::class, 'index'])->name('admin');
Route::get('/items/suggest', [ItemController::class, 'suggest'])->name('suggest');
Route::get('/items/mylist', [ItemController::class, 'mylist']);

Route::get('/item/{id}', [ItemController::class, 'detail'])->name('detail');
Route::post('/favorite/{item}', [ItemController::class, 'toggle'])->name('favorite.toggle');
Route::post('/comment/{item}', [ItemController::class, 'store'])->middleware('auth')->name('comment.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/mypage', [ItemController::class, 'mypage'])->name('mypage');
    Route::get('/edit', [ItemController::class, 'edit'])->name('edit');
    Route::post('/edit', [ItemController::class, 'update'])->name('update');
    Route::get('/mypage/items', [ItemController::class, 'myItems'])->name('mypage.my_items');
    Route::get('/mypage/purchases', [ItemController::class, 'purchasedItems'])->name('mypage.purchased_items');
});

Route::get('/sell', [ItemController::class, 'sell'])->name('sell');
Route::post('/sell', [ItemController::class, 'storeSell'])->middleware('auth')->name('items.store');

Route::get('/purchase/{item}', [ItemController::class, 'purchaseEdit']
)->name('purchase.edit')->middleware('auth');
Route::post('/purchase/card', [PurchaseController::class, 'purchaseCard'])->name('purchase.card');
Route::post('/purchase/konbini', [PurchaseController::class, 'purchaseKonbini'])->name('purchase.konbini');
Route::get('/purchase/success/{item_id}', [PurchaseController::class, 'success'])->name('success');


Route::middleware('auth')->group(function () {
    Route::get('/address/{item_id}', [ItemController::class, 'addressEdit'])->name('address.edit');
    Route::post('/address/update', [ItemController::class, 'addressUpdate'])->name('address.update');
});