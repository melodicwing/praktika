<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admin extends Controller
{
	function index()
	{
		return view('admin/index');
	}
}