<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Models\Hit;
use App\Http\Models\Guestbook;
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

	function guestbook(Request $request)
	{
		if ( $request->isMethod('post') ) {
			Guestbook::load_from_file($request);
		}

		$guestbook_messages = Guestbook::all();
		//return json_encode($guestbook_messages);
		return view('admin/guestbook', [ 'guestbook_messages' => $guestbook_messages ] );
	}
}