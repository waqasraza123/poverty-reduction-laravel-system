<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donate', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('donorId')->unsigned();
			$table->integer('moneyId')->unsigned();
			$table->integer('thingId')->unsigned();
			$table->timestamps();
		});

		Schema::table('donate', function(Blueprint $table)
		{
			$table->foreign('donorId')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('donate');
	}

}
