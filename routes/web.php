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

Route::get('/', 'MainController@index')->name('home');
Route::get('/product/{slug}', 'MainController@show')->name('product.show');
//Route::get('/currency', 'Currencycontroller@index');
Route::get('/category/{slug}', 'IndexController@category')->name('category.show');


Route::get('/currency', [
    'uses' => 'CurrencyController@index',
    'as' => 'edit'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'MainController@index')->name('home');
});