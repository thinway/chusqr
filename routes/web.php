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

Route::get('/', 'PagesController@home');
Route::get('/saludo', 'PagesController@saludo');

Route::get('/chusqers/create', 'ChusqersController@create')->middleware('auth');
Route::get('/chusqers/{chusqer}', 'ChusqersController@show');
Route::post('/chusqers/create', 'ChusqersController@store')->middleware('auth');

Route::get('/hashtag/{hashtag}', 'HashtagController@index');

Auth::routes();

Route::get('/{user}', 'UsersController@index');
Route::get('/{user}/follows', 'UsersController@follows');
Route::post('/{user}/follow', 'UsersController@follow')->middleware('auth');
Route::post('/{user}/unfollow', 'UsersController@unfollow')->middleware('auth');


//Route::get('/home', 'HomeController@index')->name('home');