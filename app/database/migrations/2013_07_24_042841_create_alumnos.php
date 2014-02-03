<?php

use Illuminate\Database\Migrations\Migration;

class CreateAlumnos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alumnos', function($table){
			$table->increments('id')->unique();
			$table->integer('id_user');
			$table->integer('matricula');
			$table->integer('grado');
			$table->integer('grupo');
			$table->string('names');
			$table->string('fname');
			$table->string('lname');
			$table->binary('foto');
			$table->integer('tipo_document');
			$table->string('num_document');
			$table->integer('exp_document');
			$table->date('date_born');
			$table->integer('pais_born');
			$table->integer('city_born');
			$table->boolean('sexo');
			$table->string('grupo_san');
			$table->string('rh');
			$table->string('eps');
			$table->integer('tipo_hermano');
			$table->string('direccion');
			$table->string('telefono');
			$table->string('celular');
			$table->string('mail');
			$table->integer('papa');
			$table->integer('mama');
			$table->integer('acudiente');
			$table->string('lastschool');
			$table->date('date_matricula');
			$table->boolean('matriculado');
			$table->boolean('nuevo');
			$table->boolean('retirado');
			$table->boolean('promovido');
			$table->boolean('retener_notas');
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
		Schema::drop('alumnos2013_2014');
	}

}