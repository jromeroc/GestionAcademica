<?php

use Illuminate\Database\Migrations\Migration;

class CreateGrupos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grupos', function($table){
			$table->increments('id');
			$table->integer('id_grado');
			$table->string('nombre');
			$table->integer('director');
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
		Schema::drop('grupos');
	}

}