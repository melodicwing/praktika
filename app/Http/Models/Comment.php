<?php

namespace App\Http\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'post_id', 'user_id', 'text', 'dateTime' ];

	public static function insert($id, $input)
	{
		$arr = [
			'post_id' => $id,
			'user_id' => Auth::user() ? Auth::user()->id : 666,
			'text' => $input,
			'dateTime' => date("Y-m-d H:i:s"),
		];

		Comment::create($arr);
	}
}
