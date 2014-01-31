<?php

use Illuminate\Database\Migrations\Migration;

class Materias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materias', function($table){
			$table->increments('id');
			$table->integer('id_area');
			$table->string('name', 100);
			$table->integer('tipo_logro');
			$table->string('abreviatura', 100);
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
		Schema::drop('materias');
	}

}