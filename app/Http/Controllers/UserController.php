<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	function index()
	{
		return view('user/index');
	}

	function about_me()
	{
		return view('user/about_me');
	}

	function interests()
	{
		return view('user/interests');
	}

	function study()
	{
		return view('user/study');
	}

	function test()
	{
		return view('user/test');
	}

	function test_result()
	{
		return view('user/test_result');
	}
}