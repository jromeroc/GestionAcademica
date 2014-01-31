<?php

use Illuminate\Database\Migrations\Migration;

class Areas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('areas', function($table){
			$table->increments('id');
			$table->string('name', 100);
			$table->integer('jefe');
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
		Schema::drop('areas');
	}

}