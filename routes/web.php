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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', 'StocksController@index');
Route::post('/', 'NextController@store');
Route::get('/download', 'StocksController@makeCSV');

Route::get('/list', 'ListController@index');
Route::delete('/list{id}', 'DestroyController@destroy');
Route::get('/list{id}', 'UpdateController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

