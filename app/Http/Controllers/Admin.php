<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Models\Hit;
use App\Http\Models\Guestbook;
use App\Http\Models\Post;
use App\Http\Models\Comment;
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

	function blog(Request $request)
	{
		if ( $request->isMethod('post') ) {
			Post::insert($request);
		}

		$posts = Post::all();

		return view('admin/blog', [ 'posts' => $posts ]);
	}

	function post($id = false)
	{
		$post = Post::where('id', $id)->get();
		$comments = Comment::comments($id);
		return view('admin/post', [ 'post' => $post, 'comments' => $comments ]);
	}

	function post_edit(Request $request, $id = false)
	{
		$input = $request->input('text');
		$post = Post::where('id', $id)->get();
		$post[0]->text = $input;
		$post[0]->save();
		return $post[0]->text;
	}
}