<?php
ini_set('memory_limit', '1024M');
ini_set('max_execution_time', '0');
ini_set('set_time_limit', '0');
ini_set('xdebug.collect_vars', 'on');
ini_set('xdebug.collect_params', '4');
ini_set('xdebug.dump_globals', 'on');
ini_set('xdebug.dump.SERVER', 'REQUEST_URI');
error_reporting(E_ALL);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Paterns

Route::pattern('id', '[0-9]+');
Route::pattern('keyword', '[a-z]+');

// Login view
Route::group(array('after' => 'auth'), function () {
	Route::get('/', 'HomeController@index');
	Route::post('/', 'HomeController@login');
	Route::get('logout', 'HomeController@logout');
	Route::post('profiles', 'HomeController@profiles');
	Route::post('loginFinish', 'HomeController@saveUser');
});

// Admin dashboard - Logged OK
//Route::group(array('before' => 'auth'), function () {
Route::group(array('prefix' => 'dashboard'), function () {
	Route::get('/', 'AdminController@index');
	Route::get('search', 'AdminController@search');
	Route::post('search', 'AdminController@searchResult');
	Route::get('fastSearch/{keyword?}', 'AdminController@fastSearch');
	Route::post('export', 'AdminController@export');
	Route::get('folder/{dir}', 'AdminController@folder');
	Route::post('folder', 'AdminController@searchFolder');
	Route::post('show_folder', 'AdminController@showFolders');
	Route::get('viewer', 'AdminController@viewer');
	Route::get('form', 'AdminController@form');
	Route::post('form', 'AdminController@saveForm');
	Route::get('profile', 'ProfileController@index');
	Route::post('profile', 'ProfileController@saveProfile');
});
//});

// Test pages
Route::get('test', function () {
});

Route::post('test', function () {
});
