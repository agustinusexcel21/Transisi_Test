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

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
   })->name("register");

Route::resource('barang_histories', 'Barang_HistoryController');

Route::resource('customers', 'CustomerController');   

Route::resource('home', 'HomeController');

Route::resource('history_details', 'History_DetailController');

Route::resource('frontends', 'HomepageController');

Route::resource('kendaraans', 'KendaraanController');

Route::resource('kendaraan_details', 'Kendaraan_DetailController');

Route::resource('users', 'UserController');

Route::resource('services', 'ServiceController');

Route::resource('service_details', 'Service_DetailController');

Route::resource('spareparts', 'SparepartController');

Route::resource('suppliers', 'SupplierController');

Route::resource('saless', 'SalesController');

Route::resource('pembayaran_transactions', 'Pembayaran_TransactionController');

Route::resource('pengadaan_transactions', 'Pengadaan_TransactionController');

Route::resource('pengadaan_details', 'Pengadaan_DetailController');

Route::resource('penjualan_transactions', 'Penjualan_TransactionController');

Route::get('penjualan_transactions/detail_create', 'Penjualan_TransactionController@detailCreate')->name('penjualan_transactions.detail_create');
    
Route::post('penjualan_transactions/detail_store', 'Penjualan_TransactionControllerController@detailStore')->name('penjualan_transactions.detail_store');

Route::resource('penjualan_details', 'Penjualan_DetailController');

Route::get('/','HomepageController@index');

Route::get('changePassword','HomeController@showChangePasswordForm');

Route::post('changePassword','HomeController@changePassword')->name('changePassword');

Route::get('/ajax/spareparts/search', 'SparepartController@ajaxSearch');

Route::get('/demo', function () {
    return view('demo');
});