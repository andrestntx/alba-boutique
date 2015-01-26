<?php  
	/**
	* 
	*/
	class AdminController extends BaseController
	{
		public function showWelcome()
		{
			return Redirect::to('admin/productos');
		}
		
	}
?>