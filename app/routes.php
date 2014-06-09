<?php

use TTT\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::any('register', 'TTT\Controllers\UsersController@Register');
Route::any('login', 'TTT\Controllers\UsersController@login');
