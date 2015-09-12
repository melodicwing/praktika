<?php

namespace App\Http\Models;

use Auth;
use App\User;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'test_results';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'q1', 'q2', 'q3', 'result', 'dateTime'];

	public static function put_answers($input)
	{
		if ($input['question_1'] == '3') {
			$question_1 = true;
		} else {
			$question_1 = false;
		}

		if ($input['question_2'] == 'Бондарев Владимир Николаевич') {
			$question_2 = true;
		} else {
			$question_2 = false;
		}

		$arr = [
			'user_id' => Auth::user() ? Auth::user()->id : 666,
			'q1' => $question_1,
			'q2' => $question_2,
			'q3' => true,
			'result' => $question_1 && $question_2,
			'dateTime' => date("Y-m-d H:i:s"),
		];

		TestResult::create($arr);

		return $arr;
	}

	public static function get_results()
	{
		$all_results = Auth::user() ? TestResult::all() : array();
		$results = array();
		if (!empty($all_results)) {
			foreach ($all_results as $row) {
				$temp = array();
				$temp['user'] = ( $row->user_id == 666 ) ? 'Аноним' : User::find($row->user_id)->name;
				$temp['when'] = $row->dateTime;
				$temp['q1'] = $row->q1;
				$temp['q2'] = $row->q2;
				$temp['q3'] = $row->q3;
				$temp['result'] = $row->result;
				$results[] = $temp;
			}
		}
		return $results;
	}
}
