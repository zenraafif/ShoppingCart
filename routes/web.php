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

Route::get('/', function () {
    return view('cart.home');
});
Route::get('/test2', function () {
    return view('test2');
});
Route::get('/pembelian', function () {
    return view('cart.shoppingCart');
});
// Route::get('/checkout', function () {
//     return view('checkout');
// });

Route::get('/cart', 'CartController@cart');
Route::get('/form', 'CartController@form');
Route::get('/index', 'CartController@home');
// Route::get('/pembelian', 'CartController@pembelian');
Route::get('/checkout', 'CartController@checkout');

// Route::get('/pembelian', 'CartController@pembelian');
Route::post('pembelian/simpan', 'CartController@TambahPinjamanAction');
Route::post('edit/action/{id}', 'CartController@edit_action');

Route::post('pembelian/checkout', 'CartController@checkout');
Route::post('pembelian/checkout_view', 'CartController@checkoutPost');
Route::post('/registerPost', 'CartController@registerPost');

Route::get('/riwayat', 'CartController@riwayat');
Route::get('/hapus/{id}','CartController@hapusRiwayat');
Route::get('/edit/{id}','CartController@getEdit');
Route::post('edit/editAction/{id}','CartController@');
Route::get('/edit/hapusDetailOrder/{id}','CartController@hapusOrder');

