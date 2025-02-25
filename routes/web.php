<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\CustomerSignUpController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomerUpdateProfileController;
use App\Http\Controllers\CustomerTopUpController;
use App\Http\Controllers\CustomerPurchaseHistoryController;
use App\Http\Controllers\AdminSignUpController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminUpdateProfileController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminUpdateProductController;


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


Route::get('/', [CategoriesController::class, 'index']);


Route::get('/login', [CustomerLoginController::class, 'index'])->name('login')->middleware('guest:customer');
Route::post('/login', [CustomerLoginController::class, 'authenticate']);
Route::post('/logout', [CustomerLoginController::class, 'logout']);

Route::get('/signup', [CustomerSignUpController::class, 'index'])->middleware('guest:customer');
Route::post('/signup', [CustomerSignUpController::class, 'store']);

Route::get('/dashboard/myprofile', [CustomerUpdateProfileController::class, 'show'])->middleware('auth:customer');
Route::put('dashboard/myprofile/update', [CustomerUpdateProfileController::class, 'update'])->middleware('auth:customer');

Route::get('/dashboard/topup', [CustomerTopUpController::class, 'show'])->middleware('auth:customer');
Route::put('/dashboard/topup/update', [CustomerTopUpController::class, 'update'])->middleware('auth:customer');

Route::get('/dashboard/purchasehistory', [CustomerPurchaseHistoryController::class, 'index'])->middleware('auth:customer');

Route::prefix('admin')->group(function(){
    Route::get('/signup', [AdminSignUpController::class, 'index'])->middleware('guest:admin');
    Route::post('/signup', [AdminSignUpController::class, 'store']);

    Route::get('/login', [AdminLoginController::class, 'index'])->middleware('guest:admin');
    Route::post('/login', [AdminLoginController::class, 'authenticate']);
    Route::post('/logout', [AdminLoginController::class, 'logout'])->middleware('auth:admin');

    Route::get('/myprofile', [AdminUpdateProfileController::class, 'show'])->middleware('auth:admin');
    Route::get('/', [AdminUpdateProfileController::class, 'show'])->middleware('auth:admin');
    Route::put('/myprofile/update', [AdminUpdateProfileController::class, 'update'])->middleware('auth:admin');

    Route::get('/productlist', [AdminProductsController::class, 'index'])->middleware('auth:admin');
    Route::get('/productlist/{product_slug}', [AdminProductsController::class, 'show'])->middleware('auth:admin');

    Route::get('/productlist/categories/{category_slug}', [AdminCategoriesController::class, 'filterByCategory'])->middleware('auth:admin');
    Route::get('/productlist', [AdminCategoriesController::class, 'index'])->middleware('auth:admin');

    Route::get('/productlist/{product_slug}', [AdminUpdateProductController::class, 'show'])->middleware('auth:admin');
    Route::put('/productlist/{product_slug}/update', [AdminUpdateProductController::class, 'update'])->middleware('auth:admin');
    
});

Route::get('{brand_slug}/{product_slug}', [ProductsController::class, 'show']);
Route::get('/{category_slug}', [CategoriesController::class, 'filterByCategory']);