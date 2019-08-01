<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'throttle:410'], function () {
    Route::get('/exchanges', "Api\ExchangeController@index");
    Route::get('/countries', "Api\CountryController@index");
    Route::get('/payments', "Api\PaymentController@index");
    Route::get('/fiats', "Api\FiatController@index");
    Route::get('/cryptos', "Api\CryptoController@index");
    Route::get('/posts', "Api\PostController@index");
    Route::get('/post/{param}', "Api\PostController@show");
    Route::post('/exchangecoincap', 'Api\ExchangeController@storeCoinCap');
    Route::post('/storeRelations', 'Api\ExchangeController@storeRelations');
    Route::post('/cryptocoincap', 'Api\CryptoController@storeCoinCap');
    Route::post('/cryptocoinmarketcap', 'Api\CryptoController@storeCoinMarketCap');
    Route::post('/fiats', 'Api\FiatController@store');
    Route::post('/payments', 'Api\PaymentController@store');
    Route::post('/countries', 'Api\CountryController@store');
});





Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
