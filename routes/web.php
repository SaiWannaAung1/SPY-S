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

//Route::get('/', function () {
//
//});

//Route::get('/vuetest','SpaController@index');

////////////supplier/////////////////////////////////////////////////////
Route::get('/supplier/create_product','ProductsController@index');
Route::get('/catSelete','ProductsController@catSelete');
Route::post('/supplier/create_product','ProductsController@store');
////////////end supplier/////////////////////////////////////////////////////

////////////admin/////////////////////////////////////////////////////
Route::get('/admin/main_category','MainCategoriesController@index');
Route::post('/admin/main_category','MainCategoriesController@store');
Route::post('/admin/main_category_delete/{slug?}/delete','MainCategoriesController@destroy');
Route::post('/admin/main_category/update','MainCategoriesController@update');

Route::post('/admin/sub_category','SubCategoriesController@store');
Route::get('/admin/{id}/{name?}/sub_category','SubCategoriesController@index');
Route::post('/admin/sub_category_delete/{id}/{name}/{slug}/delete','SubCategoriesController@destroy');
Route::post('/admin/sub_category/update','SubCategoriesController@update');
////////////admin/////////////////////////////////////////////////////

////////////public/////////////////////////////////////////////////////
Route::get('/','ProductsController@home');
Route::get('/products/{slug}','ProductsDetailController@index');
Route::get('/auth/usersRegister','UsersRegisterController@index');

////////////public/////////////////////////////////////////////////////
//Route::post( '/createuser', 'Auth\RegisterController@userCreate' )->name( 'createuser' );
Auth::routes();


