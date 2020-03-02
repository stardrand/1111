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
// Route::middleware('cehcklogin');

Route::view('/','index');	//首页

//商品
Route::prefix('goods')->group(function(){
Route::get('/create','GoodsController@create');	//添加
Route::post('/store','GoodsController@store');	//执行添加
Route::get('/','GoodsController@index');  //展示
Route::get('edit/{id}','GoodsController@edit'); //编辑
Route::post('update/{id}','GoodsController@update');    //执行编辑
Route::get('destroy/{id}','GoodsController@destroy'); //删除
});

//分类
Route::prefix('cate')->group(function(){
    Route::get('create','CateController@create');
    Route::post('store','CateController@store');
    Route::get('/','CateController@index');
    Route::get('destroy/{id}','CateController@destroy');
    Route::get('edit/{id}','CateController@edit');
    Route::post('update/{id}','CateController@update');
    Route::post('ajaxtest','CateController@ajaxtest');

});

Route::prefix('brand')->group(function(){
Route::get('create','BrandController@create');
Route::post('store','BrandController@store');
Route::get('list','BrandController@list');
Route::get('destroy/{bid}','BrandController@destroy');
Route::get('edit/{bid}','BrandController@edit');
Route::post('update/{bid}','BrandController@update');
});


