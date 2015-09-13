<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    public static function insert($input)
    {
    	$file = fopen ( '../my_storage/guestbook.inc', 'a' );
		$result = [
			'dateTime' => date("Y-m-d H:i:s"),
			'ip' => $_SERVER['REMOTE_ADDR'],
			'fio' => $input['fio'],
			'email' => $input['email'],
			'text' => $input['text'],
		];
		fwrite ( $file, json_encode($result).PHP_EOL );
		fclose ( $file );
    }
}
