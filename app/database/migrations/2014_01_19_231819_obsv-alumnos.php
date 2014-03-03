<?php

use Illuminate\Database\Migrations\Migration;

class ObsvAlumnos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Crear tabla Observacion Alumnos
		Schema::create('obsv_disciplinario', function($table){
			$table->increments('id');
			$table->date('fecha');
			$table->integer('id_docente');
			$table->binary('descripcion');
			$table->integer('grupo');
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
		Schema::drop('obsv_disciplinario');
	}

}