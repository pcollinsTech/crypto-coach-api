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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('exchanges', 'ExchangeController');
    Route::resource('blogs', 'BlogController');
    Route::resource('fiats', 'FiatController');
    Route::resource('payments', 'PaymentController');
    Route::resource('cryptos', 'CryptoController');
    Route::resource('countries', 'CountryController');
});

Auth::routes();
