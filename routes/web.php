<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@users');

Route::get('/statistic', 'HomeController@statistic');

Route::get('/home', 'HomeController@users');

Route::get('/users/{case?}', 'HomeController@users');

Route::get('/user/{id?}', 'HomeController@user');

Route::get('/find', 'HomeController@find');
Route::post('/findPost', 'HomeController@findPost');

Route::post('/action/{type}/{userId}', 'HomeController@action');

Auth::routes();
