<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'UserController@index');

Route::get('about_me', 'UserController@about_me');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::post('ajax/check_login', 'Ajax@check_login');

Route::get('admin', [ 'middleware' => 'routeadmin', 'uses' => 'Admin@index' ]);

Route::get('interests', 'UserController@interests');

Route::get('study', 'UserController@study');
Route::get('study/test', 'UserController@test');
Route::post('study/test/result', 'UserController@test_result');
Route::get('study/test/result', function(){
	return redirect('study/test');
});
