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

Route::get('/ruangan/view', 'RuanganController@index')->middleware('auth');
Route::get('/ruangan/all', 'RuanganController@all')->middleware('auth');
Route::get('/ruangan/search', 'RuanganController@search')->middleware('auth');
Route::resource('ruangan', 'RuanganController')->middleware('auth');
