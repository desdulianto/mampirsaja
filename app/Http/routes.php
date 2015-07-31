<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as'=>'root', function() {
    return view('base');
}]);

Route::get('/home', ['as'=>'account', 'uses'=>'AccountController@index']);


// route for kategori
Route::get('/kategori/{kategori}', ['as'=>'kategori', 'uses'=>'ProdukController@show']
)->where('kategori', '[A-Za-z0-9]+');

// Authentication routes...
Route::get('auth/login', ['as'=>'login', 'uses'=>'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', ['as'=>'register-role', 'uses'=>'Auth\AuthController@registerRole']);
Route::get('auth/register/{role}', ['as'=>'register', 'uses'=>'Auth\AuthController@getRegister']
)->where('role', 'pembeli|penjual');
Route::post('auth/register/{role}', ['as'=>'post-register', 'uses'=>'Auth\AuthController@postRegister']
)->where('role', 'pembeli|penjual');

// reset password route
Route::get('auth/reset', ['as'=>'resetPassword', 'uses'=>'Auth\PasswordController@getEmail']);


// toko route
Route::get('toko', ['as'=>'toko', 'uses'=>'Toko\TokoController@index']);
Route::post('toko', ['as'=>'postToko', 'uses'=>'Toko\TokoController@postToko']);

// produk route
Route::get('produk', ['as'=>'produk', 'uses'=>'Toko\ProdukController@index']);
Route::get('produk/new', ['as'=>'produkNew', 'uses'=>'Toko\ProdukController@baru']);
Route::post('produk/new', ['as'=>'postProduk', 'uses'=>'Toko\ProdukController@baruPost']);

Route::get('produk/beli/{id}', ['as'=>'beliProduk', 'uses'=>'ProdukController@beli']);

// cart route
Route::get('cart', ['as'=>'cart', 'uses'=>'CartController@index']);
Route::get('cart/del/{index}', ['as'=>'delCart', 'uses'=>'CartController@del']);
Route::get('cart/inc/{index}', ['as'=>'incCartItem', 'uses'=>'CartController@increase']);
Route::get('cart/dec/{index}', ['as'=>'decCartItem', 'uses'=>'CartController@decrease']);
