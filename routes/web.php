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

Route::get('/brand/create','BrandController@create');
Route::post('/brand/store','BrandController@store');
Route::get('/brand/list','BrandController@list');
Route::get('/brand/destroy/{bid}','BrandController@destroy');
Route::get('/brand/edit/{bid}','BrandController@edit');
Route::post('/brand/update/{bid}','BrandController@update');
