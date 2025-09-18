<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function(){ return redirect()->route('products.index'); });

Route::get('register', [UserController::class,'showRegister'])->name('register');
Route::post('register', [UserController::class,'register']);
Route::get('login', [UserController::class,'showLogin'])->name('login');
Route::post('login', [UserController::class,'login']);
Route::post('logout', [UserController::class,'logout'])->name('logout');

Route::resource('products', ProductController::class);
