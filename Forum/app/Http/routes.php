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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/user/login',[
	'as' => 'signin', function () {
    return view('signin');
}]);

Route::get('/guest/register', [
	'as' => 'signup', function (){
	return view('register');
}]);





Route::group(['middleware'=>'auth'], function() {

			Route::group(['middleware'=>'revalidate'], function() {

				Route::get('/user/homepage',[ 
				'uses'=> 'forumController@getHomepage',
				'as' => 'Homepage'
				]);

				Route::get('/user/profilepage',[ 
				'uses'=> 'forumController@getProfilepage',
				'as' => 'Profilepage'
				]);

				Route::get('/user/searchresults', [
				'uses' => 'forumController@getSearchresults',
				'as' => 'searchresults'
				]);

			});

			Route::get('/user/logout', [
			'uses' => 'forumController@getLogout',
			'as' => 'logout'
			]);

			Route::post('/user/postsearch', [
			'uses' => 'forumController@postSearch',
			'as' => 'postsearch'
			]);

			Route::post('/user/postSubmitPost', [
			'uses' => 'PostController@postSubmitPost',
			'as' => 'postSubmitPost'
			]);

			Route::post('/userwall/postSubmitPost', [
			'uses' => 'PostController@postWallSubmitPost',
			'as' => 'postWallSubmitPost'
			]);

			Route::post('/user/postuserwall', [
			'uses' => 'forumController@postUserWall',
			'as' => 'postuserwall'
			]);

			Route::post('/upateaccount', [
		    'uses' => 'forumController@postSaveAccount',
		    'as' => 'account.save'
			]);

			Route::get('/userimage/{filename}', [
		    'uses' => 'forumController@getUserImage',
		    'as' => 'account.image'
			]);
			
});


Route::post('/guest/postregister',[ 
'uses'=> 'userController@postRegister',
'as' => 'register'
]);

Route::post('/user/postlogin',[
'uses' => 'userController@postLogin',
'as' => 'login'
]);
