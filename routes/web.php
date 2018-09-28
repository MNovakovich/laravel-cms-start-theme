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

Route::get('/', function () {
	return view('themes.'.activated_theme().'.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web', 'administrator']], function () {
	Route::get('/admin', function () {
		return view('admin.index');
	});

	Route::resource('/admin/users', 'Admin\AdminUserController');
	Route::resource('/admin/posts', 'Admin\AdminPostsController');
//	Route::get('/admin/posts/{slug}/edit', 'Admin\AdminPostsController@edit')->name('posts.edit');
	Route::resource('/admin/categories', 'Admin\AdminCategoriesController');
	Route::resource('/admin/media', 'Admin\AdminMediasController');

	Route::get('/admin/options-general', 'Admin\AdminOptionsController@index');
	Route::post('/admin/options-general', 'Admin\AdminOptionsController@update');

	Route::get('/admin/themes', 'Admin\AdminThemesController@index');

//	Route::get('/admin/media/upload', ['as'=>'admin.media.upload','uses' =>'Admin\AdminMediasController@post_upload']);
    

});

/*

TESTIRANJE

 */