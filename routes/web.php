<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\CustomerSignUpController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomerUpdateProfileController;

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
Route::get('/products/{product_slug}', [ProductsController::class, 'show'])->name('products.show');

Route::get('/login', [CustomerLoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [CustomerLoginController::class, 'authenticate']);
Route::post('/logout', [CustomerLoginController::class, 'logout']);

Route::get('/signup', [CustomerSignUpController::class, 'index'])->middleware('guest');
Route::post('/signup', [CustomerSignUpController::class, 'store']);

Route::get('/dashboard/myprofile', [CustomerUpdateProfileController::class, 'show'])->middleware('auth:customer');
Route::put('dashboard/myprofile/update', [CustomerUpdateProfileController::class, 'update'])->middleware('auth:customer');

Route::get('/categories', [CategoriesController::class, 'index']);
Route::get('/categories/{category_slug}', [CategoriesController::class, 'show']);