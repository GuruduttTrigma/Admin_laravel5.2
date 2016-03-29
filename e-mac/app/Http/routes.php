<?php
Route::get('/', 'WelcomeController@index');

/*  Admin Login */
Route::get('/admin',['as' => 'admin', 'uses' => 'AdminController@login_get']);
Route::post('/admin',['as' => 'admin', 'uses' => 'AdminController@login_post']);
Route::get('/auth/login',['as' => 'admin', 'uses' => 'AdminController@login_get']);

/* Admin Panel */
Route::group(['prefix' => 'admin'], function () {
	Route::group(['middleware' => 'auth'], function () {
		Route::get('dashboard',	['as' => 'dashboard','uses' => 'AdminController@index']);
		Route::match(['get', 'post'],'my_profile',['as' => 'my_profile','uses' => 'AdminController@my_profile']);
		Route::get('users', 	['as' => 'userss','uses' => 'UserController@users']);
		Route::match(['get', 'post'],'add_user',	['as' => 'add_user','uses' => 'UserController@add_user']);
		Route::get('view_user/{id}',	['as' => 'view_user','uses' => 'UserController@view_user']);
		Route::match(['get', 'post'],'edit_user/{id}',['as' => 'edit_user','uses' => 'UserController@edit_user']);
		Route::get('delete_user/{id}', 	['as' => 'delete_user','uses' => 'UserController@delete_user']);
		Route::get('logout',['as' => 'dashboard', 'uses' => 'AdminController@logout']);
	});
});

