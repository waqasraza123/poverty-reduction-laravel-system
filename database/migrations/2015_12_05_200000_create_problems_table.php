<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('problems', function(Blueprint $table)
		{
			//only this engine supports database
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('name');
			$table->string('phone')->unique();
			$table->string('address');
			$table->string('problem');
			$table->string('severity');
			$table->integer('cost');
			$table->integer('solved')->default(0)->unsigned();
			$table->unsignedInteger('userId');
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
		Schema::table('problems', function(Blueprint $table)
		{
			$table->drop('problems');
		});
	}

}
