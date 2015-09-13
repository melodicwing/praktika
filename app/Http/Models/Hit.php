<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Hit extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'hits';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'dateTime', 'url', 'IP', 'hostname', 'browser' ];

	public static function update_hits()
	{
		$arr = [
			'dateTime' => date("Y-m-d H:i:s"),
			'url' => $_SERVER['REQUEST_URI'],
			'IP' => $_SERVER['REMOTE_ADDR'],
			'hostname' => isset($_SERVER["REMOTE_HOST"]) ? $_SERVER["REMOTE_HOST"] : gethostbyaddr($_SERVER["REMOTE_ADDR"]),
			'browser' => $_SERVER['HTTP_USER_AGENT'],
		];

		Hit::create($arr);
	}
}
