<?php 

	Route::group(['prefix' => 'admin-auth', 'namespace' => 'Admin\Auth' ], function(){
		Route::get('login','LoginController@getLogin')->name('get.admin.login');
		Route::post('login','LoginController@postLogin')->name('post.admin.login');

		Route::get('register','RegisterController@getRegister')->name('get.admin.register');
		Route::post('register','RegisterController@postRegister')->name('post.admin.register');
	});

	Route::group(['prefix' => 'quan-tri', 'namespace' => 'Admin', 'middleware' => 'check_login_admin'], function(){
		Route::get('/', function () {
		    return view('admin.index');
		})->name('admin.index');

		Route::group(['prefix' => 'de-tai'], function(){
			Route::get('','AdminTopicController@deTai')->name('admin.topic.detai');
			Route::get('/create','AdminTopicController@create')->name('admin.topic.create');
			Route::get('/{id}','AdminTopicController@index')->name('admin.topic.index');
			Route::post('create','AdminTopicController@store')->name('admin.topic.store');
			Route::get('edit/{id}','AdminTopicController@edit')->name('admin.topic.edit');
			Route::post('update/{id}','AdminTopicController@update')->name('admin.topic.update');
			Route::get('delete/{id}','AdminTopicController@delete')->name('admin.topic.delete');
		});

		Route::group(['prefix' => 'chuyen-nganh'], function(){
			Route::get('', 'ChuyenNganhController@index')->name('admin.chuyennganh.index');
			Route::get('create','ChuyenNganhController@create')->name('admin.chuyennganh.create');
			Route::post('create','ChuyenNganhController@store')->name('admin.chuyennganh.store');
			Route::get('edit/{id}','ChuyenNganhController@edit')->name('admin.chuyennganh.edit');
			Route::post('update/{id}','ChuyenNganhController@update')->name('admin.chuyennganh.update');
			Route::get('delete/{id}','ChuyenNganhController@delete')->name('admin.chuyennganh.delete');

		});

		Route::group(['prefix' => 'linh-vuc'], function(){
			Route::get('', 'LinhVucController@index')->name('admin.linhvuc.index');
			Route::get('create','LinhVucController@create')->name('admin.linhvuc.create');
			Route::post('create','LinhVucController@store')->name('admin.linhvuc.store');
			Route::get('edit/{id}','LinhVucController@edit')->name('admin.linhvuc.edit');
			Route::post('update/{id}','LinhVucController@update')->name('admin.linhvuc.update');
			Route::get('delete/{id}','LinhVucController@delete')->name('admin.linhvuc.delete');

		});

		Route::group(['prefix' => 'tin-tuc'], function() {
			Route::get('','TinTucController@tinTuc')->name('admin.tintuc.tintuc');
			Route::get('create','TinTucController@create')->name('admin.tintuc.create');
			Route::get('/{id}','TinTucController@index')->name('admin.tintuc.index');
			Route::post('create','TinTucController@store')->name('admin.tintuc.store');
			Route::get('edit/{id}','TinTucController@edit')->name('admin.tintuc.edit');
			Route::post('update/{id}','TinTucController@update')->name('admin.tintuc.update');
			Route::get('delete/{id}','TinTucController@delete')->name('admin.tintuc.delete');
		});
	});

	