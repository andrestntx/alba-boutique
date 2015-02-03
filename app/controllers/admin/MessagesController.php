<?php

class MessagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$messages = ContactMessage::orderBy('created_at', 'desc')->paginate(12); 
		return View::make('dashboard.pages.message.lists', compact('messages'));
	}
}