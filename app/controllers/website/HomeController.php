<?php

use boutique\Repositories\ProductRepo;

class HomeController extends BaseController {

	protected $productRepo;

	public function __construct(ProductRepo $productRepo)
	{
		$this->productRepo = $productRepo;
	}

	public function showWelcome()
	{
		$products= $this->productRepo->allVisible(8);
		return View::make('website.pages.home', compact('products'));
	}
}
