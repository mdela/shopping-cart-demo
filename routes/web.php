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

Route::get('/', 'MainController@index');
Route::get('logout', 'MainController@destroySession');

Route::get('shopping-cart', 'ShoppingCartController@index');

Route::get('shopping-cart/checkout', [
    'as' => 'shopping-cart.checkout', 
    'uses' => 'ShoppingCartController@checkout'
]);

Route::post('process-purchase', [
    'as' => 'invoice.store', 
    'uses' => 'InvoiceController@store'
]);

Route::get('invoice', [
    'as' => 'invoice.show', 
    'uses' => 'InvoiceController@show'
]);

Route::get('shopping-cart/add/{product}', [
    'as' => 'shopping.cart.add.item', 
    'uses' => 'ShoppingCartController@addItem'
]);

Route::get('shopping-cart/destroy', [
    'as' => 'shopping.cart.destroy', 
    'uses' => 'ShoppingCartController@destroy'
]);