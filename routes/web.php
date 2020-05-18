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

	Route::group(['prefix' => '', 'namespace' => 'fontend'], function() {
		Route::get('/', function() {
			return view('font-end.index');
		})->name('home.index');

		Route::group(['prefix' => 'de-tai'], function() {

		});
	});

