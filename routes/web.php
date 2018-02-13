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

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chat', function() {
	return view('chat');
});

Route::get('/profile', 'ProfileController@show');

Route::get('/store', function() {
	return view('my_store');
});

Route::get('/addbarang', function() {
	return view('add_barang');
});

Route::post('/fileUpload', "HomeController@fileUpload");