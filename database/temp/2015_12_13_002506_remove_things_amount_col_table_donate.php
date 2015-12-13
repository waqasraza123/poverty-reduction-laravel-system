<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveThingsAmountColTableDonate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('donate', function(Blueprint $table)
		{
			$table->dropColumn('things');
			$table->dropColumn('amount');
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
