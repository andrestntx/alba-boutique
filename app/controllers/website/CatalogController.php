<?php

class CatalogController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::getHomeCatalog(); 
		return View::make('website.pages.catalog.categories', compact('categories'));
	}


	/**
	 * Display the specified resource.
	 * GET /catalogo/{name_url}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($name_url)
	{
		$category = Category::findOrFailByNameUrl($name_url);
		return View::make('website.pages.catalog.category', compact('category'));
	}

	/**
	 * Display the specified resource.
	 * GET /catalogo/{name_url}/{product_name_url}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showProduct($name_url, $product_name_url)
	{
		$product = Product::findOrFailByNameUrl($product_name_url, $name_url);
		$category = Category::findOrFailByNameUrl($name_url);
		return View::make('website.pages.catalog.product', compact('product', 'category'));
	}


}
