<?php

class CategoriesProductsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($category_id)
	{
		$category = Category::findOrFail($category_id);
		$products = $category->products()->paginate(12); 
		return View::make('dashboard.pages.product.lists', compact('products', 'category'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /product/create
	 *
	 * @return Response
	 */
	public function create($category_id)
	{
		$category = Category::findOrFail($category_id);
		$product = new Product;
		
		$form_data = ['route' => ['admin.categorias.productos.store', $category->id], 'method' => 'POST', 'files' => 'true'];
		return View::make('dashboard.pages.product.form', compact('product', 'category', 'form_data'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /product
	 *
	 * @return Response
	 */
	public function store($category_id)
	{
		$product = new Product;
		$data = Input::all();

	    if ($product->validAndSave($data))
        {
            return Redirect::route('admin.categorias.productos.show', [$category_id, $product->id]);
        }
        else
        {
			return Redirect::route('admin.categorias.productos.create', $category_id)
				->withInput()->withErrors($product->errors);
        }
	}

	/**
	 * Display the specified resource.
	 * GET /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($category_id, $id)
	{
		$category = Category::findOrFail($category_id);
		$product = $category->products()->findOrFail($id);

		return View::make('dashboard.pages.product.show', compact('product', 'category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /product/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($category_id, $id)
	{
		$category = Category::findOrFail($category_id);
		$product = $category->products()->findOrFail($id);

		$form_data = ['route' => ['admin.categorias.productos.update', $category->id, $product->id], 'method' => 'PUT', 'files' => 'true'];
		return View::make('dashboard.pages.product.form', compact('product', 'category', 'form_data'));
 	}

	/**
	 * Update the specified resource in storage.
	 * PUT /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($category_id, $id)
	{
		$product = Product::findOrFail($id);
		$data = Input::all();
	    
	    if ($product->validAndSave($data))
        {
            return Redirect::route('admin.categorias.productos.show', [$category_id, $product->id]);
        }
        else
        {
			return Redirect::route('admin.categorias.productos.edit', [$category_id, $product->id])->withInput()->withErrors($product->errors);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($category_id, $id)
	{
		$product = Product::findOrFail($id);
    	try {
    		$product->delete();
    		$result = array('success' => true, 'msg' => 'Producto "' . $product->name . '" eliminado', 'id' => $product->id);
    	} catch (Exception $e) {
    		$result = array('success' => false, 'msg' => 'El Producto no se puede eliminar', 'id' => $product->id);
    	}

        if (Request::ajax())
        {
            return Response::json($result);
        }
        else
        {
            return Redirect::route('admin.categorias.productos.index');
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
		return Response::download($product->image);
	}


}
