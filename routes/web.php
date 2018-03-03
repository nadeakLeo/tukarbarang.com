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

Route::post('/editfileUpload', "HomeController@editfileUpload");

Route::get('/barang', 'StoreController@viewBarang');

Route::get('/mybarang', 'StoreController@viewMyBarang');

// Route For Admin
Route::prefix('admin')->group(function () {
	Route::namespace('admin')->group(function () {
		Route::get('login', 'auth\LoginController@index');
		Route::post('signIn', 'auth\LoginController@signin');
		Route::group(['middleware' => 'auth'], function() {
			Route::get('/','DashboardController@index');
			Route::get('/dashboard', 'DashboardController@index');
			Route::get('/user', 'UserController@index');
		});
	});
});