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

Route::get('/', 'MainController@getIndex')->name('home');;

Route::post('/sendmail', 'MainController@postSendEmail')->name('sendmail');

// LOGIN
Route::get('/login', 'UserController@getSignIn')->name('login');
Route::post('/login', 'UserController@postLogin')->name('post-login');
Route::get('/logout', 'UserController@getLogout')->name('logout');


// BACKEND
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'],function() {
	Route::get('/', 'MainController@start')->name('admin.start')->middleware('auth');
	Route::get('/o-firmie', 'MainController@ofirmie')->name('admin.ofirmie')->middleware('auth');
	Route::get('/oferta', 'MainController@oferta')->name('admin.oferta')->middleware('auth');
	Route::get('/projekty', 'MainController@projekty')->name('admin.projekty')->middleware('auth');
	Route::get('/kontakt', 'MainController@kontakt')->name('admin.kontakt')->middleware('auth');
	Route::get('/dojazd', 'MainController@dojazd')->name('admin.dojazd')->middleware('auth');
	Route::get('/ustawienia', 'MainController@ustawienia')->name('admin.ustawienia')->middleware('auth');

	Route::post('/setting/change', 'SettingController@change')->middleware('auth');

	Route::post('/project/edit', 'MainController@editProject')->middleware('auth');
	Route::post('/project/remove', 'MainController@destroyProject')->middleware('auth');
	Route::post('/project/create', 'MainController@createProject')->middleware('auth');

	Route::post('/oferta/upload/image', 'MainController@ofertaUploadImage')->middleware('auth');
	Route::post('/oferta/upload/thumb', 'MainController@ofertaUploadThumb')->middleware('auth');
});

Route::get('/clear', function() {
	$calls = [
		'cache:clear',
		'config:cache',
		'route:clear',
		'view:clear',
		'optimize'
	];
	foreach ($calls as $call) {
		Artisan::call($call);
		echo '<p>'.$call.'</p>';
	}
	return back();
});
