<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Guestbook extends Model
{
	protected static $path = '../my_storage/';
	protected static $fileName = 'guestbook.inc';
	protected static $fullPath;

	public static function init()
	{
		Guestbook::$fullPath = Guestbook::$path.Guestbook::$fileName;
	}

    public static function insert($input)
    {
    	$file = fopen ( Guestbook::$fullPath, 'a' );
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
    	if ( file_exists(Guestbook::$fullPath) ) {
    		$results = [];
    		$file = fopen ( Guestbook::$fullPath, 'r' );
    		while ( $row = fgets($file) ) {
				$fields = json_decode( $row );
				$result[] = $fields;
			}
			fclose ( $file );
			return $result;
    	}
    	return false;
    }

    public static function load_from_file($request)
    {
    	if ($request->hasFile('guestbook')) {
			if ($request->file('guestbook')->isValid()) {
				$request->file('guestbook')->move(Guestbook::$path, Guestbook::$fileName);
			}
		}
    }
}

Guestbook::init();
