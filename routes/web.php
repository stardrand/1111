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

