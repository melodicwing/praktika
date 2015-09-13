<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Models\TestResult;
use App\Http\Models\Hit;
use App\Http\Models\Guestbook;
use App\Http\Models\Post;
use App\Http\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
	function __construct()
	{
		Hit::update_hits();
	}

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

	function feedback()
	{
		return view('user/feedback');
	}

	function history()
	{
		$pages = Array(
			'index' => array(
				'link' => '/',
				'name' => 'Главная страница',
			),
			'about_me' => array(
				'link' => '/about_me',
				'name' => 'Обо мне',
			),
			'interests' => array(
				'link' => '/interests',
				'name' => 'Мои интересы',
			),
			'study' => array(
				'link' => '/study',
				'name' => 'Учеба',
			),
			'study_test' => array(
				'link' => '/study/test',
				'name' => 'Тест',
			),
			'gallery' => array(
				'link' => '/gallery',
				'name' => 'Фотоальбом',
			),
			'feedback' => array(
				'link' => '/feedback',
				'name' => 'Обратная связь',
			),
			'history' => array(
				'link' => '/history',
				'name' => 'История',
			),
			'guestbook' => array(
				'link' => '/guestbook',
				'name' => 'Гостевая книга',
			),
			'blog' => array(
				'link' => '/blog',
				'name' => 'Блог',
			),
		);
		return view('user/history', [ 'pages' => $pages ]);
	}

	function guestbook()
	{
		$guestbook_messages = Guestbook::all();
		//return json_encode($guestbook_messages);
		return view('user/guestbook', [ 'guestbook_messages' => $guestbook_messages ] );
	}

	function guestbook_add(Request $request)
	{
		$input = $request->all();
		Guestbook::insert($input);
		return redirect('/guestbook');
		//return exec('whoami');
		return view('user/guestbook');
	}

	function blog($id = false)
	{
		$posts = Post::all();
		return view('user/blog', [ 'posts' => $posts ]);
	}

	function post($id = false)
	{
		$post = Post::where('id', $id)->get();
		$comments = Comment::comments($id);
		return view('user/post', [ 'post' => $post, 'comments' => $comments ]);
	}

	function comment_add(Request $request, $id)
	{
		/*App\Flight::where('active', 1)
          ->where('destination', 'San Diego')
          ->update(['delayed' => 1]);
          $deletedRows = App\Flight::where('active', 0)->delete();*/
		$input = $request->input('text');
		return json_encode(Comment::insert($id, $input));
		//return 'sas';
	}
}
