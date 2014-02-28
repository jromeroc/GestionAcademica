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
			$table->string('nombre_materia');
			$table->enum('periodo',array('1','2','3'));
			$table->timestamps();
			$table->unique(array('id_carga','periodo'));
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