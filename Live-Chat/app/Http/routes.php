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
				'uses'=> 'userController@getHomepage',
				'as' => 'Homepage'
				]);

			});

			Route::get('/user/logout', [
			'uses' => 'userController@getLogout',
			'as' => 'logout'
			]);

			Route::get('/getuser', [
			'uses' => 'chatController@getUser',
			'as' => 'getUser'
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
