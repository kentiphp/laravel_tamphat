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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('suppliers.index'));
});
Route::get('home', 'HomeController@index')->name('home');

Route::resources([ 'suppliers' => 'SupplierController' ]);
Route::resources([ 'commodities' => 'CommodityController' ]);
Route::resources([ 'customers' => 'CustomerController' ]);
Route::resources([ 'import' => 'ImportController' ]);
Route::resources([ 'export' => 'ExportController' ]);
