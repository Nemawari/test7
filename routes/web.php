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

Route::get('/list', 'ProductController@showList')->name('list');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'ProductController@showCreate')->name('create');
Route::get('/detail/{id}', 'ProductController@showDetail')->name('detail');
Route::get('/detail/{id}/update', 'ProductController@showUpdate')->name('update');


Route::get('/search', 'ProductController@search')->name('search');
// Route::get('/sort', 'ProductController@sort')->name('sort');
// Route::post('/delete', 'ProductController@delete')->name('delete');



// Route::post('/register', 'ProductController@register')->name('register');
// Route::post('/update', 'ProductController@update')->name('update');