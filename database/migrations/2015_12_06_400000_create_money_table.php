<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoneyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('money', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('organization')->default(null);
			$table->string('phone');
			$table->string('email');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->integer('cost')->notNull()->unsigned();
			$table->integer('problemId')->unsigned();
			$table->timestamps();
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
		Schema::drop('money');
	}

}
