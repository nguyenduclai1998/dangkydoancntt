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

		Route::middleware(['check_login_user'])->group(function() {
			Route::get('/{slug}-{id}.html', 'DeTaiController@index')
	                ->where('slug','[a-zA-Z0-9-_]+')
                	->name('fontend.detai.index');
            Route::get('{slug}/{detai_slug}-{id}.html', 'DeTaiController@view')
	                ->where('slug','[a-zA-Z0-9-_]+')
	                ->where('detai_slug','[a-zA-Z0-9-_]+')
                	->name('fontend.detai.view');

            Route::get('/dang-ky-de-tai-{id}', 'DeTaiController@getTopic')
            		->name('fontend.detai.getDangkydetai');

            Route::post('/dang-ky-de-tai-{id}', 'DeTaiController@postTopic')
            		->name('fontend.detai.postDangkydetai');
            
            Route::group(['prefix' => 'users'], function(){
            	Route::get('profile', 'UsersController@getInfo')->name('get.fontend.info');
            	Route::post('update-profile', 'UsersController@updateProfile')->name('post.fontend.info');
            	Route::get('change-password', 'UsersController@getChangePassword')->name('get.fontend.changepassword');
            	Route::post('change-password', 'UsersController@postChangePassword')->name('post.fontend.changepassword');
            	Route::get('ket-qua-dang-ky', 'UsersController@registerResult')->name('get.fontend.registerResult');
            });

            Route::group(['prefix' => 'tin-tuc'], function(){
            	Route::get('', 'TinTucController@getNews')->name('get.fontend.news');
            	Route::get('/{slug}-{id}.htm','TinTucController@viewNews')
            			->where('slug','[a-zA-Z0-9-_]+')
            			->name('fontend.tintuc.view');
            });
		});
	});

