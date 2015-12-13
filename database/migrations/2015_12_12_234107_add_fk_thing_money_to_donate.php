<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkThingMoneyToDonate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('donate', function(Blueprint $table)
		{
			$table->integer('moneyId')->unsigned();
			$table->integer('thingId')->unsigned();

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
