<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHitsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hits', function (Blueprint $table) {
			$table->increments('id');
			$table->dateTime('dateTime');
			$table->string('url');
			$table->string('IP');
			$table->string('hostname');
			$table->string('browser');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hits');
	}
}
