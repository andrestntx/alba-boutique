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

		Mail::queue('emails.feedback', $view_data, function($message) use ($email_data)
        {
		    $message->from('contacto@alba.boutique', 'Alba Boutique');
			$message->to('andresmaopinzon@gmail.com', 'Andrés Pinzón')
				->subject('Mensaje de ' . $email_data['name']. ' a través del Formulario Contacto');

		});

		Mail::queue('emails.info', $view_data, function($message) use ($email_data)
        {
		    $message->from('contacto@alba.boutique', 'Alba Boutique');
			$message->to($email_data['email'], $email_data['name'])
				->subject('Gracias por escribirnos...');

		});

		return View::make('website.pages.contact')->with('message', 'Tu Mensaje ha sido enviado. Gracias!');

	}
}