<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Guestbook extends Model
{
	protected static $path = '../my_storage/guestbook.inc';

    public static function insert($input)
    {
    	$file = fopen ( Guestbook::$path, 'a' );
		$result = [
			'dateTime' => date("Y-m-d H:i:s"),
			'ip' => $_SERVER['REMOTE_ADDR'],
			'fio' => $input['fio'],
			'login' => Auth::user() ? Auth::user()->name : 'Аноним',
			'email' => $input['email'],
			'text' => $input['text'],
		];
		fwrite ( $file, json_encode($result).PHP_EOL );
		fclose ( $file );
    }

    public static function all($columns = Array())
    {
    	if ( file_exists(Guestbook::$path) ) {
    		$results = [];
    		$file = fopen ( Guestbook::$path, 'r' );
    		while ( $row = fgets($file) ) {
				$fields = json_decode( $row );
				$result[] = $fields;
			}
			fclose ( $file );
			return $result;
    	}
    	return false;
    }
}
