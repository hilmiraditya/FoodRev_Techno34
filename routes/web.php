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
    return view('welcome');
});

Route::get('/checkout/success', function () {
    return view('checkoutsukses');
});

// Route::get('/nyoba', function () {
//     return view('invoice2');
// });


// Route::get('/nyoba', function () {
//     return view('checkout');
// });


Route::get('/pesan', 'PesananController@order_etalase');
Route::get('/pesan/tambah/{id}', 'PesananController@tambah_keranjang');
Route::get('/pesan/keranjang/{token}', 'PesananController@getKeranjang');
Route::get('/pesan/keranjang/hapus/{id}', 'PesananController@hapusKeranjang');
Route::get('/checkout', 'PesananController@checkout');
Route::post('/checkout/submit', 'PesananController@checkoutSubmit');
Route::get('/list-menu', 'AdminController@lihat_list_menu');
Route::get('/pesanan', 'AdminController@lihat_pesanan');



// Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/home', 'HomeController@index')->name('home');
