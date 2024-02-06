<?php

//use App\Http\Controllers\ProductController;

use App\Livewire\ProductIndex;
use App\Livewire\Productsdetails;
use App\Livewire\ShoppingCart;
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
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('products', ProductIndex::class)->name('products.index');
    Route::get(('products/{product}'), Productsdetails::class)->name('products.show');
    Route::get('cart', ShoppingCart::class)->name('cart.index');

});
