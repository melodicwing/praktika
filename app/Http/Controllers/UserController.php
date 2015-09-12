<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Models\TestResult;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

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
		$results = TestResult::get_results();

		return view('user/test', [ 'results' => $results ]);
	}

	function test_result(Request $request)
	{
		if ($request->isMethod('post')) {
			$validator = Validator::make(
				$request->all(),
				[
					'question_1' => array('Regex:/3/'),
					'question_2' => array('Regex:/Бондарев Владимир Николаевич/'),
				],
				[
					'question_1.same' => 'первый вопрос',
					'question_2.same' => 'второй вопрос',
				]
			);

			$res = TestResult::put_answers($request->only('question_1', 'question_2', 'question_3'));

			if ($validator->fails()) {
				return view('user/test_result', [ 'result' => 'Тест не пройден', 'from_model' => $res ]);
				return redirect('study/test/result')
					->withErrors($validator);
			} else {
				return view('user/test_result', [ 'result' => 'Тест пройден', 'from_model' => $res ]);
			}
		}
	}

	function gallery()
	{
		return view('user/gallery');
	}
}