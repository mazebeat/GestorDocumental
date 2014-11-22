<?php

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
Route::group(array('before' => 'auth'), function () {
	Route::group(array('prefix' => 'dashboard'), function () {
		Route::get('/', 'AdminController@index');
		Route::get('search', 'AdminController@search');
		Route::post('search', 'AdminController@search_result');
		Route::get('fastSearch/{keyword?}', 'AdminController@fast_search');
		Route::post('export', 'AdminController@export');
		Route::get('folder', 'AdminController@folder');
		Route::post('folder', 'AdminController@search_folder');
		Route::post('show_folder', 'AdminController@show_folders');
		Route::get('viewer', 'AdminController@viewer');
		Route::get('form', 'AdminController@form');
		Route::post('form', 'AdminController@form');
		Route::get('profile', 'ProfileController@index');
	});
});

// Test pages
Route::get('test', function () {
	$data    = array();
	$folders = array();
	$ws      = new \WebServiceController();
	$ws->setCodUtils('10');
	$ws->setCarpeta("a_2014**m_03");
	$result = $ws->get('listFolder');

//	if ($result->ok) {
	var_dump($result);
//		var_dump(sizeof((array)$result->lista, 0));
//		var_dump(count((array)$result->lista));
//		var_dump(is_object($result->lista));

	var_dump(sizeof($result['documentList']));
	var_dump(sizeof((array)array($result['documentList'])));
	var_dump(is_object($result['documentList']));

	$ws      = new \WebServiceController();
	$ws->setCodUtils('10');
	$ws->setCarpeta("a_2014**m_01");
	$result = $ws->get('listFolder');

	//	if ($result->ok) {
	var_dump($result);
	//		var_dump(sizeof((array)$result->lista, 0));
	//		var_dump(count((array)$result->lista));
	//		var_dump(is_object($result->lista));

	var_dump(sizeof($result['documentList']));
	var_dump(sizeof((array)array($result['documentList'])));
	var_dump(is_object($result['documentList']));


//		var_dump(count((array)$result['documentList']) < 4);
//		if (count($result->lista) > 1) {
//			foreach ($result->lista as $key => $value) {
//								var_dump($value);
//				array_push($folders, array('name' => $value->strcarpeta,
//				                           'id'   => $value->stridcarpeta,
//				                           'root' => $value->strrutacarpeta));
//			}
//		} else {
//			$folders = array('name' => $result->lista->strcarpeta,
//			                 'id'   => $result->lista->stridcarpeta,
//			                 'root' => $result->lista->strrutacarpeta);
//		}
//		$data['ok']     = true;
//		$data['folder'] = $folders;
//	}
//	var_dump($data);
});

Route::post('test', function () {
});
