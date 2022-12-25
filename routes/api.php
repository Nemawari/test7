<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test',function(){return ['aaa'=>'bbb'];});
Route::post('/ajax_search','ProductController@ajax_search');
Route::post('/product_delete/{id}','ProductController@product_delete');


// 仕様書5 Salesへの紐付け
Route::post('/sales_at/{id}','API\SalesController@sales_at');