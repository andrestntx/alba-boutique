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
Route::resource('post', 'PostController');

Route::get('/', ['as' => '/', 'uses' => 'HomeController@showWelcome']);


Route::get('regalos', ['as' => 'regalos', 'uses' => 'HomeController@showGift']);
Route::get('ventas-al-por-mayor', ['as' => 'ventas-al-por-mayor', 'uses' => 'HomeController@showWholesale']);
Route::get('venta-de-pijamas-al-por-mayor', ['as' => 'venta-de-pijamas-al-por-mayor', 'uses' => 'HomeController@showWholesalePijamas']);
Route::post('venta-de-pijamas-al-por-mayor-gracias', ['as' => 'venta-de-pijamas-al-por-mayor.post', 'uses' => 'HomeController@postContactWholesalePijamas']);
Route::resource('catalogo', 'CatalogController');
Route::get('catalogo/{category}/{product}', ['as' => 'catalogo.producto', 'uses' => 'CatalogController@showProduct']);

Route::get('contacto', ['as' => 'contacto', 'uses' => 'ContactController@index']);
Route::post('contacto-gracias', ['as' => 'contacto.send', 'uses' => 'ContactController@send']);

Route::get('descargar-producto/{id}', ['as' => 'product.download', 'uses' => 'ProductController@download']);

/*
* Routes Dashboard
*/
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@showLogin']);
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);

Route::group(array('before' => 'auth'), function()
{
	Route::group(array('prefix' => 'admin'), function()
	{
		View::share('categoriesMenu', Category::all());

		Route::controller('imagenes', 'ImagesController');

		Route::get('/', ['uses' => 'AdminController@showWelcome']);
	    Route::resource('categorias', 'CategoryController');
	    Route::resource('categorias.productos', 'CategoriesProductsController');

	    Route::get('mensajes', ['uses' => 'MessagesController@index']);
	    Route::get('buscar-producto', ['as' => 'productos.buscar', 'uses' => 'ProductController@search']);
	    Route::get('categorias/{id}/descargar-pdf', ['as' => 'admin.categorias.productos.pdf', 'uses' => 'ProductController@generatePdf']);
	    Route::get('categorias/{id}/descargar-precios', ['as' => 'admin.categorias.productos.precios-pdf', 'uses' => 'ProductController@generatePricePdf']);
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
