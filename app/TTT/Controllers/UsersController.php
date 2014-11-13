<?php namespace TTT\Controllers;

use BaseController, View, Input, Validator, Redirect, Sentry, Auth;

class UsersController extends BaseController {


	public function login()
	{
		return View::make('login');
	}

	public function logout() 
	{
		Auth::logout();
	}

	public function register()
	{
		return View::make('register');
	}

	public function create() 
	{
		$User = Input::all();

		$rules = [
			'first_name' 	=> 'required',
			'last_name' 	=> 'required',
			'username' 		=> 'required|min:3',
			'password' 		=> 'required|min:5|alpha_dash',
			'email' 		=> 'unique:users|email|required'
		];

		$validator = Validator::make($User, $rules);

		if($validator->fails()) {
			
			return $validator->messages();
		
		} else {
		
			$NewUser = Sentry::register($User);

			if($NewUser) {
				Auth::loginUsingId($NewUser['id']);
				return Auth::user();
			} else {

			}

			return Redirect::to('/');

		}

		

		

		//DB::insert('insert into users (id, name) values (?, ?)', array($entry));
	}

}
