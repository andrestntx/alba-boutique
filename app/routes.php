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
Route::get('regalos', ['as' => 'regalos', 'uses' => 'HomeController@showGift']);
Route::get('ventas-al-por-mayor', ['as' => 'ventas-al-por-mayor', 'uses' => 'HomeController@showWholesale']);

Route::get('contacto', ['as' => 'contacto', 'uses' => 'ContactController@index']);
Route::post('contacto', ['as' => 'contacto.send', 'uses' => 'ContactController@send']);

Route::get('desgargar-producto/{id}', ['as' => 'product.download', 'uses' => 'ProductController@download']);

/*
* Routes Dashboard
*/
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@showLogin']);
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);

Route::group(array('before' => 'auth'), function()
{
	Route::group(array('prefix' => 'admin'), function()
	{
		Route::get('/', ['uses' => 'AdminController@showWelcome']);
	    Route::resource('productos', 'ProductController');
	    Route::resource('categorias', 'CategoryController');
	});   

	Route::get('logout', 'AuthController@getLogout');
});



/* 
* Routes Errors 
*
*/
App::error(function(ModelNotFoundException $e)
{
    return Response::view('errors.404', array(), 404);
});

App::missing(function($exception)
{
	return Response::view('errors.404', array(), 404);
});
