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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product', 'ShopifyController@handlePost');
Route::get('/redirect', 'ShopifyController@redirect');
Route::post('/send', 'ShopifyController@create')->name('send');
Route::get('/get-product', 'ShopifyController@product');




