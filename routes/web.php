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

Route::get('/list', 'ProductController@showList')->name('list')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'ProductController@showCreate')->name('create')->middleware('auth');
Route::get('/{id}', 'ProductController@showDetail')->name('detail')->middleware('auth');
Route::get('/detail/{id}/update', 'ProductController@showUpdate')->name('update')->middleware('auth');


Route::get('/search', 'ProductController@search')->name('search')->middleware('auth');
Route::get('/sort', 'ProductController@sort')->name('sort')->middleware('auth');



Route::post('/product_register', 'ProductController@register')->name('product_register')->middleware('auth');
Route::post('/product_update', 'ProductController@update')->name('product_update')->middleware('auth');
Route::post('/delete/{id}', 'ProductController@delete')->name('delete')->middleware('auth');