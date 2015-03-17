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
		Zipper::make('files/products.zip')->add($files)->close();

		if(File::exists('files/products.zip'))
		{
			return Response::download('files/products.zip', 'ProductosConPreciosAlDetal.zip');
		}
	}

	public function getPreciosPorMayor()
	{
		//$files = glob('img/products/price_wholesale/*');
		//Zipper::make('files/products.zip')->add($files)->close();

		$z = new ZipArchive();
		$z->open("test.zip", ZIPARCHIVE::CREATE);
		folderToZip("img/products/price_wholesale", $z);
		$z->close();

		return Response::download('files/products.zip', 'ProductosConPreciosPorMayor.zip');
	}

	public function getTodosLosPrecios()
	{
		$files = glob('img/products/price_sale_wholesale/*');
		var_dump($files);
		//Zipper::make('files/products.zip')->add($files)->close();

		//return Response::download('files/products.zip', 'ProductosConTodosLosPrecios.zip');
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