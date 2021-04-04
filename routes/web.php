<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CustomerController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('shop', ShopController::class);
Route::resource('customer', CustomerController::class);

Auth::routes(['register'=>false]);

Route::get('/shop/destroy/{shop}', [App\Http\Controllers\ShopController::class, 'destroy'])->name('shop/destroy');
Route::get('/shop/update/{shop}', [App\Http\Controllers\ShopController::class, 'update'])->name('shop/update');
Route::post('/shop/edit/', [App\Http\Controllers\ShopController::class, 'edit'])->name('shop/edit');

Route::get('/customer/destroy/{customer}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer/destroy');
Route::get('/customer/update/{customer}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer/update');
Route::post('/customer/edit/', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer/edit');
