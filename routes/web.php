<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\CustomerSignUpController;
use App\Http\Controllers\CustomerDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductsController::class, 'index']);

Route::get('/login', [CustomerLoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [CustomerLoginController::class, 'authenticate']);
Route::post('/logout', [CustomerLoginController::class, 'logout']);

Route::get('/signup', [CustomerSignUpController::class, 'index'])->middleware('guest');
Route::post('/signup', [CustomerSignUpController::class, 'store']);

Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->middleware('auth:customer');