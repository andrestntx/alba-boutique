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


	public function generatePdf($category_id)
	{
		$categories = Category::whereId($category_id)->with(['products' => function($query){
			$query->whereVisible(1)->get();
		}])->get();
		$pdf = PDF::loadView('dashboard.pages.product.lists-pdf', compact('categories'));
		return $pdf->download($categories[0]->name.'.pdf');
	}

}