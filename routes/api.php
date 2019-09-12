<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1'], function () {
    Route::get('/supplier/{code}', 'Api\SupplierController@get')->name('v1.get-supplier');
    Route::get('/supplier/{code}/commodities', 'Api\SupplierController@getCommodities')->name('v1.get-supplier-commodities');
    Route::get('/customer/{code}', 'Api\CustomerController@get')->name('v1.get-customer');
    Route::get('/commodities', 'Api\CommodityController@getAll')->name('v1.get-all-commodity');
    Route::get('/commodity/{code}', 'Api\CommodityController@get')->name('v1.get-commodity');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

