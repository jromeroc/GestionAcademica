<?php

use Illuminate\Database\Migrations\Migration;

class CreateMapCarga extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('map_carga', function($table){
			$table->increments('id');
			$table->integer('id_carga');
			$table->integer('id_docente');
			$table->integer('periodo');
			$table->timestamps();
			$table->unique(array('id_carga','id_docente','periodo'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('map_carga');
	}

}