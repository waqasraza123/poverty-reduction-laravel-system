<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProblemIdToThingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('things', function(Blueprint $table)
		{
			$table->integer('problemId')->unsigned();
		});

		Schema::table('things', function(Blueprint $table)
		{
			$table->foreign('problemId')->references('id')->on('problems');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('things', function(Blueprint $table)
		{
			$table->dropIfExists('problemId');
		});
	}

}
