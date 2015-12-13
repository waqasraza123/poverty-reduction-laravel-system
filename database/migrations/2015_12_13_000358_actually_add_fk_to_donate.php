<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActuallyAddFkToDonate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('donate', function(Blueprint $table)
		{
			$table->foreign('moneyId')->references('id')->on('money');
			$table->foreign('thingId')->references('id')->on('things');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('donate', function(Blueprint $table)
		{
			//
		});
	}

}
