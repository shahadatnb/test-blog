<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('guestbook', function(){
	return view('guestbook');
});

Route::get('api/message', function(){
	return App/Message::All();
});

Route::post('api/message', function(){
	return App/Message::create(Request::All());
});


	Route::get('auth/login', ['as'=>'login','uses'=>'Auth\AuthController@getLogin']);
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', ['as'=>'logout','uses'=> 'Auth\AuthController@getLogout']);

	route::get('auth/register', ['as'=>'register','uses'=>'Auth\AuthController@getRegister']);
	route::post('auth/register','Auth\AuthController@postRegister');

	Route::get('password/reset/{token?}','Auth\PasswordController@showResetForm');
	Route::post('password/email','Auth\PasswordController@sendResetLinkEmail');
	Route::post('password/reset','Auth\PasswordController@reset');

	Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
	Route::get('blog', ['uses'=>'BlogController@getIndex','as'=>'blog.index']);

	Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);

	Route::get('/', 'PageController@getIndex');
	Route::get('about', 'PageController@getAbout');
	Route::resource('posts','PostController');
	Route::resource('categories','CategoryController');
	Route::resource('tags','TagController');

	Route::post('admin-assign',['uses' => 'RoleController@postAssignRole', 'as' => 'admin-assign']);
	Route::get('admin',
	[
		'uses' => 'RoleController@getAdminPage',
		'as'	=>	'admin',
		'middleware'	=>	'roles',
		'roles'	=>	['admin']
	]);

	Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
	Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');


/*Route::group(['middleware' => 'web'], function(){
	
});*/