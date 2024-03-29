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
Route::resource('dish', 'DishController');
Route::resource('restaurant', 'RestaurantController');

// Redirect to the product page
Route::get('/', function () {
    return redirect("dish");
});

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

use App\Product;
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); */
