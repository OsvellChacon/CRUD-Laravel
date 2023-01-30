<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productcontroller; 

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
    return view('app');
});

Route::get('/products', function () {
    return view('products.index');
});

Route::get('/products', [productcontroller::class, 'index'])->name('products');
Route::post('/products', [productcontroller::class, 'store'])->name('products');

Route::get('/products/{id}', [productcontroller::class, 'show'])->name('products-edit');
Route::patch('/products/{id}', [productcontroller::class, 'update'])->name('products-update');

Route::delete('/products/{id}', [productcontroller::class, 'destroy'])->name('products-destroy');