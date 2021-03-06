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

/*Route::get('/', ['as'=>'root', function() {
    return view('base');
}]);*/

Route::get('/', ['as'=>'root', 'uses'=>'ProdukController@show']);

Route::get('/home', ['as'=>'account', 'uses'=>'AccountController@index']);
//Route::get('/home', ['as'=>'account', 'uses'=>'ProdukController@show']);
Route::post('/password', ['as'=>'ubahPassword', 'uses'=>'AccountController@ubahPassword']);
Route::post('/info', ['as'=>'ubahInfo', 'uses'=>'AccountController@ubahInfo']);


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
Route::get('auth/confirm/{kode}', ['as'=>'register-confirm', 'uses'=>'Auth\AuthController@registerConfirm']);

// reset password route
Route::get('auth/reset', ['as'=>'resetPassword', 'uses'=>'Auth\PasswordController@getEmail']);
Route::post('auth/reset', ['as'=>'postResetPassword', 'uses'=>'Auth\PasswordController@postEmail']);
Route::get('password/reset/{token}', ['as'=>'resetPasswordToken', 'uses'=>'Auth\PasswordController@getReset']);
Route::post('password/reset', ['as'=>'postResetPasswordToken', 'uses'=>'Auth\PasswordController@postReset']);


// toko route
Route::get('toko', ['as'=>'toko', 'uses'=>'Toko\TokoController@index']);
Route::post('toko', ['as'=>'postToko', 'uses'=>'Toko\TokoController@postToko']);
Route::get('toko/orders', ['as'=>'tokoOrders', 'uses'=>'Toko\TokoController@listOrders']);
Route::get('toko/orders/{id}', ['as'=>'kirimOrder', 'uses'=>'Toko\TokoController@kirim']);
Route::post('toko/orders/{id}', ['as'=>'postKirimOrder', 'uses'=>'Toko\TokoController@kirim']);

// produk route
Route::get('produk', ['as'=>'produk', 'uses'=>'Toko\ProdukController@index']);
Route::get('produk/new', ['as'=>'produkNew', 'uses'=>'Toko\ProdukController@baru']);
Route::post('produk/new', ['as'=>'postProduk', 'uses'=>'Toko\ProdukController@baruPost']);
Route::get('produk/delete/{id}', ['as'=>'produkDelete', 'uses'=>'Toko\ProdukController@hapus']);

Route::get('produk/beli/{id}', ['as'=>'beliProduk', 'uses'=>'ProdukController@beli']);
Route::get('produk/detail/{id}', ['as'=>'detailProduk', 'uses'=>'ProdukController@detail']);
Route::post('produk/review/{id}', ['as'=>'reviewProduk', 'uses'=>'ProdukController@review']);

Route::get('produk/cari/', ['as'=>'cariProduk', 'uses'=>'ProdukController@cari']);

// cart route
Route::get('cart', ['as'=>'cart', 'uses'=>'CartController@index']);
Route::get('cart/del/{index}', ['as'=>'delCart', 'uses'=>'CartController@del']);
Route::get('cart/inc/{index}', ['as'=>'incCartItem', 'uses'=>'CartController@increase']);
Route::get('cart/dec/{index}', ['as'=>'decCartItem', 'uses'=>'CartController@decrease']);
Route::get('checkout', ['as'=>'checkout', 'uses'=>'CartController@checkout']);
//Route::post('checkout/alamat', ['as'=>'checkoutAlamat', 'uses'=>'CartController@checkoutAlamat']);
Route::post('checkout/confirm', ['as'=>'checkoutConfirm', 'uses'=>'CartController@confirmOrder']);
Route::post('checkout/biaya', ['as'=>'checkoutBiayaKirim', 'uses'=>'CartController@biayaXHR']);

// admin account
Route::post('/home', ['as'=>'postAccount', 'uses'=>'AccountController@save']);
Route::get('/orders', ['as'=>'adminOrders', 'uses'=>'Admin\AdminController@orders']);
Route::get('/orders/pembayaran/{id}', ['as'=>'checkPembayaran', 'uses'=>'Admin\AdminController@checkPembayaran']);
Route::post('/orders/pembayaran/{id}', ['as'=>'postCheckPembayaran', 'uses'=>'Admin\AdminController@checkPembayaran']);

// pembeli account
Route::get('/user/orders', ['as'=>'pembeliOrders', 'uses'=>'Pembeli\PembeliController@orders']);
Route::get('/user/confirm/{id}', ['as'=>'confirmPembayaran', 'uses'=>'Pembeli\PembeliController@confirmPembayaran']);
Route::post('/user/confirm/{id}', ['as'=>'postConfirmPembayaran', 'uses'=>'Pembeli\PembeliController@confirmPembayaran']);
Route::get('/user/pengiriman/{id}', ['as'=>'resiPengiriman', 'uses'=>'Pembeli\PembeliController@resiPengiriman']);


// support route
Route::get('/support/order/{id}', ['as'=>'listSupportPosts', 'uses'=>'SupportController@listSupportPosts']);
Route::get('/support/order/{order_id}/{toko_id}', ['as'=>'supportPost', 'uses'=>'SupportController@supportPosts']);
Route::get('/support/order/{order_id}/{toko_id}/new', ['as'=>'newSupportPost', 'uses'=>'SupportController@newPost']);
Route::post('/support/order/{order_id}/{toko_id}/new', ['as'=>'newSupportPost', 'uses'=>'SupportController@newPost']);
Route::post('/support/order/{order_id}/{toko_id}/new', ['as'=>'postNewSupportPost', 'uses'=>'SupportController@newPost']);
Route::get('/support/order/{order_id}/{toko_id}/reply', ['as'=>'replySupportPost', 'uses'=>'SupportController@replyPost']);
Route::post('/support/order/{order_id}/{toko_id}/reply', ['as'=>'postReplySupportPost', 'uses'=>'SupportController@replyPost']);
Route::get('/support/order/{order_id}/{toko_id}/close', ['as'=>'tutupSupportPost', 'uses'=>'SupportController@tutupTicket']);

// lelang route
//Route::get('/toko/lelang', ['as'=>'lelang', 'uses'=>'Toko\LelangController@index']);
//Route::get('/toko/lelang/new', ['as'=>'newLelang', 'uses'=>'Toko\LelangController@baru']);

// message route
Route::get('/messages', ['as'=>'messages', 'uses'=>'MessageController@index']);
Route::get('/messages/compose', ['as'=>'compose', 'uses'=>'MessageController@compose']);
Route::post('/messages/compose', ['as'=>'postCompose', 'uses'=>'MessageController@compose']);
Route::get('/messages/read/{id}', ['as'=>'read', 'uses'=>'MessageController@read']);
Route::get('/messages/reply/{id}', ['as'=>'reply', 'uses'=>'MessageController@reply']);
Route::post('/messages/reply/{id}', ['as'=>'postReply', 'uses'=>'MessageController@reply']);

// report user
Route::get('/users', ['as'=>'users', 'uses'=>'Admin\UserController@index']);
Route::get('/user/{username}', ['as'=>'user', 'uses'=>'Admin\UserController@detail']);
Route::get('/user/block/{username}', ['as'=>'blockUser', 'uses'=>'Admin\UserController@block']);
Route::get('/user/unblock/{username}', ['as'=>'unblockUser', 'uses'=>'Admin\UserController@unblock']);

// cronjob
Route::get('/cron', ['as'=>'cronjob', 'uses'=>'CronJob@jobs']);
