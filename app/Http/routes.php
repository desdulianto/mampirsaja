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

Route::get('/', function() {
    return view('base');
});

Route::get('/home', ['as'=>'account', 'uses'=>'AccountController@index']);

// route for kategori
Route::get('/produk/{kategori}', ['as'=>'kategori', 'uses'=>'ProdukController@show']
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
