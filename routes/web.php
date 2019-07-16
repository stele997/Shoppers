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

Route::get('/','FrontEndController@index')->named('index');
Route::get('/about','FrontEndController@about')->named('about');
Route::get('/contact','FrontEndController@contact')->named('contact');
Route::get('/shop','FrontEndController@shop')->named('shop');
Route::get('/men','FrontEndController@men');
Route::get('/women','FrontEndController@women');
Route::get('/cart','FrontEndController@cart')->named('cart');
Route::get('/checkout','FrontEndController@checkout')->named('checkOut');
Route::get('/thankyou','FrontEndController@thankyou')->named('thankyou');
Route::get('/login/{var?}','FrontEndController@logIn')->named('login');
Route::post('/register','register@register');
Route::post('/login','login@login');
Route::get('/logout','logout@logout');
Route::get('/acctivated/{aktivacioniKod}','FrontEndController@acctivate');
Route::get('/singleProduct/{id}','frontEndController@singleProduct');
Route::get('/cart/{id}/{kolicina}','cart@addToCart');
Route::get('/nesto/{id}','cart@removeFromCart');
Route::post('/naruci','order@naruci');
Route::get('/search','shop@search');
Route::get('/search/men','shop@searchMen');
Route::get('/search/women','shop@searchWomen');
Route::get('/pagination/fetch_data','paginationController@fetch_data');
Route::get('/pagination/men/fetch_data','paginationController@fetch_dataMan');
Route::get('/pagination/women/fetch_data','paginationController@fetch_dataWoman');
Route::post('/sendMessage','contact@sendMessage');
Route::get('/products','BackEndController@proizovd');
Route::get('/users','BackEndController@korisnik');
Route::get('/changeRole','BackEndController@uloga');
Route::get('/orders','BackEndController@narudzbine');
Route::post('/role/insert','RoleController@insert');
Route::post('/role/delete','RoleController@delete');
Route::post('/product/updateForma','ProductController@updateForma');
Route::post('/product/update','ProductController@update');
Route::post('/product/delete','ProductController@delete');
Route::post('/product/insert','ProductController@insert');
Route::post('/user/updateForma','UserController@updateForma');
Route::post('/user/update','UserController@update');
Route::post('/user/delete','UserController@delete');

