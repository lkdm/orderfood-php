<?php

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

// Products
Route::resource('product', 'ProductController');

// Redirect to the product page
Route::get('/', function () {
    return redirect("product");
});

use App\Product;
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
