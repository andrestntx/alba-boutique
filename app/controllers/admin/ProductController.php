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
		return Response::download($product->image);
	}


	public function generatePdf()
	{
		$categories = Category::with('products')->get();
		$pdf = PDF::loadView('dashboard.pages.product.lists-pdf', compact('categories'));
		return $pdf->download('productos.pdf');
		return View::make('dashboard.pages.product.lists-pdf', compact('categories'));
	}

}