<?php

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::paginate(8); 
		return View::make('dashboard.pages.category.lists', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /category/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$category = new Category;
		$form_data = ['route' => ['admin.categorias.store', $category->id], 'method' => 'POST', 'files' => 'true'];
		return View::make('dashboard.pages.category.form', compact('category', 'form_data'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /category
	 *
	 * @return Response
	 */
	public function store()
	{
		$category = new Category;
		$data = Input::all();

	    if ($category->validAndSave($data))
        {
            return Redirect::route('admin.categorias.index');
        }
        else
        {
			return Redirect::route('admin.categorias.create')->withInput()->withErrors($category->errors);
        }
	}

	/**
	 * Display the specified resource.
	 * GET /category/{id}
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
	 * GET /category/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::findOrFail($id);
		$form_data = ['route' => ['admin.categorias.update', $category->id], 'method' => 'PUT', 'files' => 'true'];
		return View::make('dashboard.pages.category.form', compact('category', 'form_data'));
 	}

	/**
	 * Update the specified resource in storage.
	 * PUT /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$category = Category::findOrFail($id);
		$data = Input::all();

	    if ($category->validAndSave($data))
        {
            return Redirect::route('admin.categorias.index');
        }
        else
        {
			return Redirect::route('admin.categorias.edit', $category->id)->withInput()->withErrors($category->errors);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Category::findOrFail($id);
    	try {
    		$category->delete();
    		$result = array('success' => true, 'msg' => 'Categoría "' . $category->name . '" eliminada', 'id' => $category->id);
    	} catch (Exception $e) {
    		$result = array('success' => false, 'msg' => 'La Categoría no se puede eliminar', 'id' => $category->id);
    	}

        if (Request::ajax())
        {
            return Response::json($result);
        }
        else
        {
            return Redirect::route('admin.categorias.index');
        }
	}


}
