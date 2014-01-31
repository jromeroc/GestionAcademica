<?php

use Illuminate\Database\Migrations\Migration;

class AsigObservaciones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Crear tabla asig-observaciones
		Schema::create('map_obs_academico', function($table){
			$table->increments('id_obsv');
			$table->integer('id_alumno');
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
		//Eliminar tabla
		Schema::drop('map_obs_academico');
	}

}