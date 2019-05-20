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

//order
Route::get('getorder','MyController@index');
Route::get('getPriceList','MyController@getPriceList');
//Route::get('get-city-list','MyController@getCityList');

//saving
Route::post('insert','MyController@insert');

Route::resource('orders', 'OrderController');
//graph
Route::get('graph','MyController@gotograph');

//piechart
Route::get('piechart','MyController@piechart');
//bargraph
Route::get('bargraph','MyController@bargra');
//linegraph
Route::get('linegraph','MyController@linegra');