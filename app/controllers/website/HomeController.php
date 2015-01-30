<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		$categories = Category::getHomeCatalog(); 
		return View::make('website.pages.home', compact('categories'));
	}

	public function showGift()
	{
		return View::make('website.pages.gift');
	}

	public function showWholesale()
	{
		return View::make('website.pages.wholesale');
	}

	public function showWholesalePijamas()
	{
		$category = Category::find(6);
		$category->load('products');

		return View::make('website.pages.wholesale.pijamas', compact('pijamas', 'category'));
	}

	public function postContactWholesalePijamas()
	{
		$data = Input::all();
		ContactMessage::create($data);		

		$category = Category::find(6);
		$category->load('products');

		return View::make('website.pages.wholesale.pijamas', compact('pijamas', 'category'))->with('message', 'Gracias. Hemos Recibido tu Mensaje. Pronto te Llámaremos');

	}
}
