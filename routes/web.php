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
include 'route_admin.php';
	
	Route::group(['prefix' => 'users-auth', 'namespace' => 'Fontend\Auth'], function(){
		Route::get('login', 'LoginController@getLogin')->name('get.fontend.login');
		Route::post('login', 'LoginController@postLogin')->name('post.fontend.login');

		Route::get('register', 'RegisterController@getRegister')->name('get.fontend.register');
		Route::post('register', 'RegisterController@postRegister')->name('post.fontend.register');
	});

	Route::group(['prefix' => '', 'namespace' => 'Fontend'], function() {
		Route::get('/', function() {
			return view('font-end.index');
		})->name('home.index');

		Route::group(['prefix' => ''], function() {
			Route::get('/{slug}-{id}.html', 'DeTaiController@index')
	                ->where('slug','[a-zA-Z0-9-_]+')
                	->name('fontend.detai.index');

            Route::get('{slug}/{detai_slug}-{id}.html', 'DeTaiController@view')
	                ->where('detai_slug','[a-zA-Z0-9-_]+')
                	->name('fontend.detai.view');

		});
	});

