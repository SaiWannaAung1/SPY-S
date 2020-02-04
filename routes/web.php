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
    return view('client.index');
});
Route::get('/admin/main_category','MainCategoriesController@index');
Route::post('/admin/main_category','MainCategoriesController@store');
Route::post('/admin/main_category_delete/{slug?}/delete','MainCategoriesController@destroy');
Route::post('/admin/main_category/update','MainCategoriesController@update');
