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

//comment routes
Route::post('comments/{post_id}', ['as'=>'comments.store' , 'uses'=>'CommentController@store']);
Route::get('comments/{id}/edit', ['as'=>'comments.edit' , 'uses'=>'CommentController@edit']);
Route::put('comments/{id}', ['as'=>'comments.update' , 'uses'=>'CommentController@update']);
Route::get('comments/{id}/confirmDelete', ['as'=>'comments.confirmDelete', 'uses'=>'CommentController@confirmDelete']);
Route::delete('comments/{id}', ['as'=>'comments.destroy' , 'uses'=>'CommentController@destroy']);

//tag crud routes
Route::resource('tags', 'TagController', ['except'=>['create']]);

//category crud routes
Route::resource('categories', 'CategoryController', ['except'=>['create']]);

//password resets routes
Route::get('password/reset',['as'=>'password.request',
 'uses'=>'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', ['as'=>'password.email',
 'uses'=>'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as'=>'password.reset',
 'uses'=>'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset', ['as'=>'password.changed',
 'uses'=>'Auth\ResetPasswordController@reset']);

//Authentification routes
Route::get('login', ['as'=>'login', 'uses'=>'Auth\LoginController@showLoginForm']);
Route::post('login', ['as'=>'login.post','uses'=>'Auth\LoginController@login']);
Route::get('logout', ['as'=>'logout', 'uses'=>'Auth\LoginController@logout']);

//Register routes
Route::get('register', ['as'=>'register', 'uses'=>'Auth\RegisterController@showRegistrationForm']);
Route::post('register', ['as'=>'register.post','uses'=>'Auth\RegisterController@register']);

//for blog
Route::get('/blog/{slug}',[
	      		   'as'=>'blog.single',
			       'uses'=>'BlogController@getSingle'
			        ])->where('slug','[\w\d\-\_]+');
Route::get('blog', ['as'=>'blog.index', 'uses'=>'BlogController@getIndex']);

//post routes
Route::resource('posts','PostController');


//page routes
Route::get('/contact', 'PagesController@getContact');
Route::get('/about','PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');

?>