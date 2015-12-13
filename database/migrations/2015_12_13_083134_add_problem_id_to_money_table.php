<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProblemIdToMoneyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('money', function(Blueprint $table)
		{
			$table->integer('problemId')->unsigned();
		});

		Schema::table('money', function(Blueprint $table)
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
		Schema::table('money', function(Blueprint $table)
		{
			$table->dropIfExists('problemId');
		});
	}

}
