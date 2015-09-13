<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Models\Hit;
use Illuminate\Http\Request;

class Admin extends Controller
{
	function index()
	{
		return view('admin/index');
	}

	function hits()
	{
		$hits = Hit::orderBy('dateTime', 'desc')->paginate(10);

		return view('admin/hits', [ 'hits' => $hits ]);
	}
}