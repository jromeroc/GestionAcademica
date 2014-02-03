<?php

use Illuminate\Database\Migrations\Migration;

class CreateCargaAcademica extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carga_academica', function($table){
			$table->increments('id');
			$table->integer('grupo');
			$table->integer('materia');
			$table->integer('ih');
			$table->boolean('estado');
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
		Schema::drop('carga_academica');
	}

}