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
    return view('home');
})->name('home');

Route::get('/product/{id}', function ($id) {
    return view('product');
})->name('product');

Route::middleware(['auth:sanctum', 'verified'])->post('/product', function () {
    return 'post_product';
})->name('post_product');

Route::middleware(['auth:sanctum', 'verified'])->put('/product/{id}', function ($id) {
    return 'edit_product';
})->name('put_product');

Route::middleware(['auth:sanctum', 'verified'])->delete('/product/{id}', function ($id) {
    return 'delete product';
})->name('delete_product');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/private', function () {
    return view('private');
})->name('private');

Route::middleware(['auth:sanctum', 'verified'])->get('/private/create-product', function () {
    return view('create_product');
})->name('create_product');

Route::middleware(['auth:sanctum', 'verified'])->get('/private/edit-product/{id}', function ($id) {
    return view('edit_product');
})->name('edit_product');
