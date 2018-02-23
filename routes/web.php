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

Route::get('/chusqers/{chusqer}', 'ChusqersController@show');
Route::get('/hashtag/{hashtag}', 'HashtagController@index');

Auth::routes();

Route::get('/{user}', 'UsersController@index');
Route::get('/{user}/follows', 'UsersController@follows');
Route::get('/{user}/followers', 'UsersController@followers');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/chusqers/create', 'ChusqersController@create');
    Route::post('/chusqers/create', 'ChusqersController@store');
    Route::get('/conversations/{conversation}', 'UsersController@showConversation');
    Route::post('/{user}/follow', 'UsersController@follow');
    Route::post('/{user}/unfollow', 'UsersController@unfollow');
    Route::post('/{user}/dms', 'UsersController@sendPrivateMessage');

    Route::get('/profile/edit', 'UsersController@profile');
    Route::get('/profile/account', 'UsersController@edit')->name('profile.account');
    Route::patch('/profile/account', 'UsersController@update');
    Route::get('/profile/password', 'UsersController@edit')->name('profile.password');
    Route::patch('/profile/password', 'UsersController@update');
    Route::get('/profile/avatar', 'UsersController@edit')->name('profile.avatar');
});

//Route::get('/home', 'HomeController@index')->name('home');













