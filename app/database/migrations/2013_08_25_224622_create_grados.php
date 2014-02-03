<?php

use Illuminate\Database\Migrations\Migration;

class CreateGrados extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grados', function($table){
			$table->increments('id');
			$table->string('nombre');
			$table->integer('seccion');
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
		Schema::drop('grados');
	}

}