<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PrivateController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product');

Route::middleware(['auth:sanctum', 'verified'])->post('/product', [ProductController::class, 'create'])->name('post_product');

Route::middleware(['auth:sanctum', 'verified'])->put('/product/{id}', [ProductController::class, 'update'])->name('put_product');

Route::middleware(['auth:sanctum', 'verified'])->delete('/product/{id}', [ProductController::class, 'remove'])->name('delete_product');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/private', [PrivateController::class, 'show'])->name('private');

Route::middleware(['auth:sanctum', 'verified'])->get('/private/create-product', function () {
    return view('create_product');
})->name('create_product');

Route::middleware(['auth:sanctum', 'verified'])->get('/private/edit-product/{id}', [ProductController::class, 'edit'])->name('edit_product');
