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

Route::get('/vuehome', function () {
return view("home");
});

//Route::get('/vuetest','SpaController@index');

////////////supplier/////////////////////////////////////////////////////
Route::get('/supplier/create_product','ProductsController@index');
Route::get('/catSelete','ProductsController@catSelete');
Route::post('/supplier/create_product','ProductsController@store');
Route::get('/supplier/profile','SupplierProfileController@index');
Route::post('/supplier/profile','SupplierProfileController@update');
Route::get('/supplier/view_product','ProductsController@view_product');
Route::get('/supplier/product/{slug}/edit','ProductsController@edit_product');
Route::post('/supplier/product_delete/{slug}','ProductsController@delete_product');
Route::post('/supplier/update_product','ProductsController@update_product');
Route::get('/supplier/daily_sale','ReportsController@daily_sale');
Route::get('/supplier/monthly_sale','ReportsController@monthly_sale');
Route::get('/supplier/yearly_sale','ReportsController@yearly_sale');
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
Route::get('/admin/supplier_daily_sale','AdminReportsController@supplier_daily_sale');
Route::get('/admin/supplier_monthly_sale','AdminReportsController@supplier_monthly_sale');
Route::get('/admin/supplier_yearly_sale','AdminReportsController@supplier_yearly_sale');
////////////admin/////////////////////////////////////////////////////

////////////public/////////////////////////////////////////////////////
Route::get('/','ProductsController@home');
Route::get('/products/{slug}','ProductsDetailController@index');
Route::get('/auth/usersRegister','UsersRegisterController@index');
Route::get('/shoppingCart','ShoppingCartController@index');
Route::post('/shoppingCart','ShoppingCartController@cart');
Route::post('/payout','ShoppingCartController@payout');
Route::post('/payment/stripe','ShoppingCartController@stripePayment');

////////////public/////////////////////////////////////////////////////
//Route::post( '/createuser', 'Auth\RegisterController@userCreate' )->name( 'createuser' );

////////////customer/////////////////////////////////////////////////////
Route::get('/customer/chat','CustomerChartController@index');
Route::get('/userlist','MessagesController@user_list')->name('user.list');
Route::get('/usermessage/{id}','MessagesController@user_message')->name('user.message');
Route::post('senemessage','MessagesController@send_message')->name('user.message.send');

////////////end customer/////////////////////////////////////////////////////
Auth::routes();


