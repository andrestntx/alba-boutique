<?php

class AuthController extends BaseController {

	public function showLogin()
 	{
 		if (Auth::check())
        {
            return Redirect::to('admin');
        }
        else
        {
        	return View::make('auth.login');
        }
 	}

	public function postLogin()
	{
		$userdata = Input::only('username','password');
		$userdata['username'] = trim($userdata['username']);
		$userdata['password'] = trim($userdata['password']);
		$remember = Input::get('remember');

		if(Auth::attempt($userdata, $remember))
		{
			return Redirect::intended('admin');
		}
		else
		{	
			return Redirect::to('login')->with('error', 'Datos invalidos, verifique su nombre de usuario y contraseña')->withInput();
		}
	}
		 
	public Function getLogout()
	{
		Session::flush(); 
        Auth::logout();  
        return Redirect::to('login')->with('success', 'Ha cerrado la sesión satisfactoriamente.'); 
	}

}