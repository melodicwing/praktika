<?php

namespace App\Http\Models;

use Auth;
use App\User;
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

		$res =  Comment::create($arr);
		$temp = [];
		$temp['user'] = ( $res->user_id == 666 ) ? 'Аноним' : User::find($res->user_id)->name;
		$temp['dateTime'] = $res->dateTime;
		$temp['text'] = $res->text;
		return $temp;
	}

	public static function comments($id)
	{
		$res = Comment::where('post_id', $id)->get();
		$elems = [];
		foreach ($res as $row) {
			$temp = [];
			$temp['user'] = ( $row->user_id == 666 ) ? 'Аноним' : User::find($row->user_id)->name;
			$temp['dateTime'] = $row->dateTime;
			$temp['text'] = $row->text;
			$elems[] = $temp;
		}

		return $elems;
	}
}
