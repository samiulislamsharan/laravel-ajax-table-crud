<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index'])->name('products');
Route::post('/store-product', [ProductController::class, 'store'])->name('product.store');
Route::put('/update-product', [ProductController::class, 'update'])->name('product.update');
Route::delete('/delete-product', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/pagination/paginate-data', [ProductController::class, 'pagination']);
Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');