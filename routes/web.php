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

Route::get('/', 'PageController@home');
Route::get('produtos', 'ProductController@index');
Route::get('quem-somos', 'PageController@quemsomos');
Route::get('termos-compra', 'PageController@termos');
Route::get('contato', 'PageController@contato');
Route::get('cart', 'CartController@index');

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\ProductController@index');
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@attempt');
    Route::middleware('auth')->group(function () {
        Route::resource('products', 'Admin\ProductController');
        Route::resource('categories', 'Admin\CategoryController');
        Route::get('shippings', 'Admin\ShippingController@index');
        Route::put('shippings', 'Admin\ShippingController@update');
        Route::post('shippings/options', 'Admin\ShippingController@storeOption');
        Route::delete('shippings/options/{id}', 'Admin\ShippingController@deleteOption');
        Route::put('shippings/options', 'Admin\ShippingController@updateOptions');
    });
});
