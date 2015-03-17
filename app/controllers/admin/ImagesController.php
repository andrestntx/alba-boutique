<?php

class ImagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getPreciosDetal()
	{
		$files = glob('img/products/price_sale/*');
		Zipper::make('products.zip')->add($files)->close();

		return Response::download('products.zip', 'ProductosConPreciosAlDetal.zip');
	}

	public function getPreciosPorMayor()
	{
		$files = glob('img/products/price_wholesale/*');
		Zipper::make('products.zip')->add($files)->close();

		return Response::download('products.zip', 'ProductosConPreciosPorMayor.zip');
	}

	public function getTodosLosPrecios()
	{
		$files = glob('img/products/price_sale_wholesale/*');
		Zipper::make('products.zip')->add($files)->close();

		return Response::download('products.zip', 'ProductosConTodosLosPrecios.zip');
	}

	public function getActualizar()
	{
		
		$products = Product::all();
		foreach ($products as $product) 
		{
			$product->formateImages($product->id);
		}

		echo " actualizó ";
	}

}