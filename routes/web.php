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



Route::get('/', 'PagesController@home')->name('home');
Route::get('/saludo', 'PagesController@saludo');

Route::get('/chusqers', 'ChusqersController@search');

Route::get('/chusqers/{chusqer}', 'ChusqersController@show');
Route::get('/hashtag/{hashtag}', 'HashtagController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::redirect('/profile', '/profile/account', 302);

    Route::get('/chusqers/create', 'ChusqersController@create');
    Route::post('/chusqers/create', 'ChusqersController@store');
    Route::get('/conversations/{conversation}', 'UsersController@showConversation')->name('conversation.show');
    Route::post('/{user}/follow', 'UsersController@follow');
    Route::post('/{user}/unfollow', 'UsersController@unfollow');
    Route::post('/{user}/dms', 'UsersController@sendPrivateMessage');


    Route::get('/profile/edit', 'UsersController@profile')->name('profile');
    Route::get('/profile/account', 'UsersController@edit')->name('profile.account');
    Route::patch('/profile/account', 'UsersController@update');
    Route::get('/profile/password', 'UsersController@edit')->name('profile.password');
    Route::patch('/profile/password', 'UsersController@update');
    Route::get('/profile/avatar', 'UsersController@edit')->name('profile.avatar');
    Route::get('/profile/delete', 'UsersController@edit')->name('profile.delete');
    Route::delete('/profile/delete', 'UsersController@destroy');
});

Route::get('/{user}', 'UsersController@show')->name('user');
Route::get('/{user}/follows', 'UsersController@follows');
Route::get('/{user}/followers', 'UsersController@followers');












