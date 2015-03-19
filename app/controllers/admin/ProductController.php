<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /product
	 *
	 * @return Response
	 */
	public function search()
	{
		$id = trim(Input::get('id'));
		$product = Product::findOrFail($id);
		return Redirect::route('admin.categorias.productos.show', [$product->category_id, $product->id]);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /descargar-producto/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function download($id)
	{
		$product = Product::findOrFail($id);
		return Response::download($product->image_id, 'alba-boutique-'.$product->id.'.jpg');
	}

	public function downloadSale($id)
	{
		$product = Product::findOrFail($id);
		return Response::download($product->price_sale_image, $product->id.'-detal.jpg');
	}

	public function downloadWholesale($id)
	{
		$product = Product::findOrFail($id);
		return Response::download($product->path_price_whole_sale_image, $product->id.'-por-mayor.jpg');
	}

	public function downloadSaleWholesale($id)
	{
		$product = Product::findOrFail($id);
		return Response::download($product->path_price_sale_whole_sale_image, $product->id.'-detal-por-mayor.jpg');
	}


	public function generatePdf($category_id)
	{
		$categories = Category::whereId($category_id)->with(['products' => function($query){
			$query->whereVisible(1)->get();
		}])->get();

		$pdf = PDF::loadView('dashboard.pages.product.lists-pdf', compact('categories'));
		return $pdf->stream($categories[0]->name.'.pdf');
	}

	public function generatePricePdf($category_id)
	{
		$categories = Category::whereId($category_id)->with(['products' => function($query){
			$query->whereVisible(1)->get();
		}])->get();

		$pdf = PDF::loadView('dashboard.pages.product.price-pdf', compact('categories'));
		return $pdf->stream('Precios '.$categories[0]->name.'.pdf');
	}

}