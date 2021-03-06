<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return redirect('/products');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return redirect('/products');
});

Route::resource('products', ProductController::class)->only([
    'index', 'show'
]);

Route::resource('orders', OrderController::class);

Route::post('/add-to-cart/{id}', [OrderController::class, 'addToCart']);
Route::post('/remove-from-cart/{id}', [OrderController::class, 'removeFromCart']);
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
