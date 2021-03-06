<?php

	Route::group(['prefix' => 'admin-auth', 'namespace' => 'Admin\Auth' ], function(){
		Route::get('login','LoginController@getLogin')->name('get.admin.login');
		Route::post('login','LoginController@postLogin')->name('post.admin.login');
		Route::get('logout','LoginController@logOut')->name('post.admin.logout');

		Route::get('register','RegisterController@getRegister')->name('get.admin.register');
		Route::post('register','RegisterController@postRegister')->name('post.admin.register');
	});

	//Import and Export file
	Route::get('export', 'HomeController@export')->name('export')->middleware('check_login_admin');
	Route::get('test', 'HomeController@test')->middleware('check_login_admin');
	Route::get('importExportView', 'HomeController@importExportView')->name('importview')->middleware('check_login_admin');
	Route::post('import', 'HomeController@import')->name('import')->middleware('check_login_admin');

	//Route set time.
	Route::get('time','HomeController@indexTime')->name('admin.indexTime')->middleware('check_login_admin');
	Route::post('create-time', 'HomeController@setTime')->name('admin.setTime')->middleware('check_login_admin');
	Route::get('update-time','HomeController@updateTime')->name('admin.updateTime')->middleware('check_login_admin');
	Route::get('delete/{id}', 'HomeController@deteleTime')->name('admin.deteleTime')->middleware('check_login_admin');

	Route::group(['prefix' => 'quan-tri', 'namespace' => 'Admin', 'middleware' => 'check_login_admin'], function(){
		Route::get('/', function () {
		    return view('admin.index');
		})->name('admin.index');

		//Route upload anh trong bai viet
		Route::post('image-upload', 'ImageUploadController@imageUpload')->name('admin.image.upload');

		Route::group(['prefix' => 'de-tai'], function(){
			Route::get('','AdminTopicController@deTai')->name('admin.topic.detai');
			Route::get('/create','AdminTopicController@create')->name('admin.topic.create');
			Route::get('/{id}','AdminTopicController@show')->name('admin.topic.index');
			Route::post('create','AdminTopicController@store')->name('admin.topic.store');
			Route::get('edit/{detai_id}','AdminTopicController@edit')->name('admin.topic.edit');
			Route::post('update/{detai_id}','AdminTopicController@update')->name('admin.topic.update');
			Route::get('delete/{detai_id}','AdminTopicController@delete')->name('admin.topic.delete');
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

		Route::group(['prefix' => 'quan-ly-giao-vien'], function() {
			Route::get('', 'QuanLyGiaoVienController@index')->name('admin.quanlygiaovien.index');
			Route::get('create', 'QuanLyGiaoVienController@create')->name('admin.quanlygiaovien.create');
			Route::post('create', 'QuanLyGiaoVienController@store')->name('admin.quanlygiaovien.store');
			Route::get('view/{id}','QuanLyGiaoVienController@view')->name('admin.quanlygiaovien.view');
			Route::post('change-password', 'QuanLyGiaoVienController@changePassword')->name('admin.quanlygiaovien.changepassword');
			Route::post('update-profile', 'QuanLyGiaoVienController@updateProfile')->name('admin.quanlygiaovien.updateprofile');
			Route::get('update-profile', 'QuanLyGiaoVienController@profile')->name('admin.quanlygiaovien.profile');
			Route::post('role/{id}', 'QuanLyGiaoVienController@role')->name('admin.quanlygiaovien.role');
		});

		Route::group(['prefix' => 'quan-ly-sinh-vien'], function() {
			Route::get('', 'QuanLySinhVienController@index')->name('admin.quanlysinhvien.index');
			Route::get('create', 'QuanLySinhVienController@create')->name('admin.quanlysinhvien.create');
			Route::post('create', 'QuanLySinhVienController@store')->name('admin.quanlysinhvien.store');
			Route::get('view/{id}','QuanLySinhVienController@view')->name('admin.quanlysinhvien.view');
			Route::post('reset-password/{user_id}', 'QuanLySinhVienController@resetPassword')->name('admin.quanlysinhvien.resetpassword');
		});

		Route::group(['prefix' => 'ket-qua-dang-ky'], function() {
			Route::get('', 'KetquadangkyController@index')->name('admin.ketquadangky.index');
		});

		Route::group(['prefix' => 'phan-de-tai'], function() {
			Route::get('', 'PhandetaiController@index')->name('admin.phandetai.index');
			Route::get('phan-de-tai', 'PhandetaiController@phandetai')->name('admin.phandetai.phandetai');
		});
	});

