<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Ajax extends Controller
{
	function check_login(Request $request)
	{
		if ($request->isMethod('post')) {
			$val = $request->input('login');
			if ($val == '') {
				return 'empty';
			}
			$res = User::all();
			foreach ($res as $value) {
				if ($val == $value->name) {
					return 'duplicate';
				}
			}
			return 'unique';
			return json_encode($elems);
			return 'sas';
		}
	}
}