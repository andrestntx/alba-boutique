<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
* Routes WebSite
*/
Route::get('/', ['as' => '/', 'uses' => 'HomeController@showWelcome']);

Route::get('contacto', ['as' => 'contacto', 'uses' => 'ContactController@index']);
Route::post('contacto', ['as' => 'contacto.send', 'uses' => 'ContactController@send']);

/*
* Routes Dashboard
*/

Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@postLogin');

Route::group(array('before' => 'auth'), function()
{
    Route::resource('admin', 'ProductController');
    Route::get('logout', 'AuthController@getLogout');
});






/* 
* Routes Errors 
*
*/
App::error(function(ModelNotFoundException $e)
{
    //return Response::view('errors.404', array(), 404);
});

App::missing(function($exception)
{
	var_dump($exception);
	//return Response::view('errors.404', array(), 404);
});

/* Todo tipo de error */ 
App::error(function(Exception $exception, $code) 
{
    Log::error($exception);
    var_dump($exception);
    //return Response::view('errors.404', [], 500);
});