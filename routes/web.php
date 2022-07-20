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
    // return view('welcome');
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/store', [App\Http\Controllers\HomeController::class, 'create_store'])->name('store');
Route::get('/seller', [App\Http\Controllers\HomeController::class, 'add_seller'])->name('seller');
Route::get('/item', [App\Http\Controllers\HomeController::class, 'add_item'])->name('item');
Route::get('/buy', [App\Http\Controllers\HomeController::class, 'buyitem'])->name('buy');
Route::get('/sell', [App\Http\Controllers\HomeController::class, 'sellitem'])->name('sell');
Route::post('/add_store', [App\Http\Controllers\HomeController::class, 'add_store'])->name('add_store');
Route::post('/add_seller', [App\Http\Controllers\HomeController::class, 'addseller'])->name('add_seller');
Route::post('/add_item', [App\Http\Controllers\HomeController::class, 'additem'])->name('add_item');
Route::post('/buy_item', [App\Http\Controllers\HomeController::class, 'buy_item'])->name('buy_item');
Route::post('/sell_item', [App\Http\Controllers\HomeController::class, 'sell_item'])->name('sell_item');
