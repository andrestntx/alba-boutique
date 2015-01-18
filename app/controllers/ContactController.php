<?php

class ContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /contact
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('website.pages.contact');
	}


	/**
	 * Store a newly created resource in storage.
	 * POST /contact
	 *
	 * @return Response
	 */
	public function send()
	{
		$email_data = Input::all();
		$view_data = $email_data;

		ContactMessage::create($email_data);		

		return View::make('website.pages.contact')->with('message', 'Tu Mensaje ha sido enviado. Gracias!');

	}
}