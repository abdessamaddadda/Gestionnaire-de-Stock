<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductStocksController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StorageLocationsController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('login.register');
Route::post('/register', [LoginController::class, 'registernew'])->name('registernew');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

// disables register
//Auth::routes(['register' => false]);

// redirect requests to register to login





// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Resource Routes
Route::resource('products', ProductsController::class)->middleware('auth');
Route::resource('product-categories', ProductCategoriesController::class)->middleware('auth');
Route::resource('suppliers', SuppliersController::class)->middleware('auth');
Route::resource('storage-locations', StorageLocationsController::class)->middleware('auth');
Route::resource('customers', CustomersController::class)->middleware('auth');
Route::resource('orders', OrdersController::class)->middleware('auth');

// Stock Routes
Route::get('/stock/add', [ProductStocksController::class, 'addView'])->middleware('auth');
Route::post('/product-stocks/addStock', [ProductStocksController::class, 'addStock'])->middleware('auth');
Route::get('/stock/remove', [ProductStocksController::class, 'removeView'])->middleware('auth');
Route::post('product-stocks/removeStock', [ProductStocksController::class, 'removeStock'])->middleware('auth');
Route::get('/stock/move', [ProductStocksController::class, 'moveView'])->middleware('auth');
Route::post('product-stocks/moveStock', [ProductStocksController::class, 'moveStock'])->middleware('auth');

// User Management Routes
Route::get('/users/create', [UsersController::class, 'create'])->middleware('auth');
Route::post('/users/create', [UsersController::class, 'store'])->middleware('auth');
Route::get('/users', [UsersController::class, 'index'])->middleware('auth');
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->middleware('auth');
Route::put('/users/{id}', [UsersController::class, 'update'])->middleware('auth');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->middleware('auth');
