<?php namespace TTT\Controllers;

use BaseController, View;

class UsersController extends BaseController {


	public function login()
	{
		return View::make('login');
	}

	public function register()
	{
		return View::make('register');
	}

}
