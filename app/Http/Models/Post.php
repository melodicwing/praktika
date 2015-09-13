<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'title', 'text', 'dateTime', 'path_to_img' ];

	protected static $path = 'assets/img/blog/';

	public static function insert($request)
	{
		$fullPath = '';
		if ($request->hasFile('img')) {
			if ($request->file('img')->isValid()) {
				$originalName = $request->file('img')->getClientOriginalName();
				$fullPath = Post::$path.$originalName;
				$request->file('img')->move(Post::$path, $originalName);
			}
		}

		$arr = [
			'title' => $request->input('title'),
			'text' => $request->input('text'),
			'dateTime' => date("Y-m-d H:i:s"),
			'path_to_img' => $fullPath,
		];

		Post::create($arr);
	}
}
