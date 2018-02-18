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

Route::get('/', 'HomeController@index');

Route::get('/about', function () {
    return view('about');
});


Auth::routes();

Route::get('auth/facebook', 'SocialAuthFacebookController@redirect')->name('facebook.login');
Route::get('auth/facebook/callback', 'SocialAuthFacebookController@callback');

Route::get('auth/google', 'GoogleController@redirectToProvider')->name('google.login');
Route::get('auth/google/callback', 'GoogleController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chat', function() {
	return view('chat');
});

Route::get('/profile', 'ProfileController@show');

Route::get('/store', 'StoreController@index');

Route::get('/addbarang', function() {
	return view('add_barang');
});

Route::post('/fileUpload', "HomeController@fileUpload");