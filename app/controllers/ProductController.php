<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /product
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::paginate(8); 
		return View::make('dashboard.pages.product.lists', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /product/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$product = new Product;
		$form_data = ['route' => ['admin.store', $product->id], 'method' => 'POST', 'files' => 'true'];
		return View::make('dashboard.pages.product.form', compact('product', 'form_data'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /product
	 *
	 * @return Response
	 */
	public function store()
	{
		$product = new Product;
		$data = Input::all();

	    if ($product->validAndSave($data))
        {
            return Redirect::route('admin.index');
        }
        else
        {
			return Redirect::route('admin.create')->withInput()->withErrors($product->errors);
        }
	}

	/**
	 * Display the specified resource.
	 * GET /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /product/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::findOrFail($id);
		$form_data = ['route' => ['admin.update', $product->id], 'method' => 'PUT', 'files' => 'true'];
		return View::make('dashboard.pages.product.form', compact('product', 'form_data'));
 	}

	/**
	 * Update the specified resource in storage.
	 * PUT /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Product::findOrFail($id);
		$data = Input::all();

	    if ($product->validAndSave($data))
        {
            return Redirect::route('admin.index');
        }
        else
        {
			return Redirect::route('admin.edit', $product->id)->withInput()->withErrors($product->errors);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::findOrFail($id);
    	try {
    		$product->delete();
    		$result = array('success' => true, 'msg' => 'Producto "' . $product->name . '" eliminado', 'id' => $product->id);
    	} catch (Exception $e) {
    		$result = array('success' => false, 'msg' => 'La Producto no se puede eliminar', 'id' => $product->id);
    	}

        if (Request::ajax())
        {
            return Response::json($result);
        }
        else
        {
            return Redirect::route('admin.index');
        }
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
		return Response::download($product->path_image);
	}

}