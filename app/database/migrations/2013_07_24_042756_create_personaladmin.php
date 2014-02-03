<?php

use Illuminate\Database\Migrations\Migration;

class CreatePersonaladmin extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personal', function($table){
			$table->increments('id')->unique();
			$table->integer('id_user')->unique();
			$table->string('nombres');
			$table->string('pri_apellido');
			$table->string('seg_apellido');
			$table->integer('tipo_doc');
			$table->string('num_doc')->unique();
			$table->string('email')->unique();
			$table->string('telefono');
			$table->string('celular');
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
		Schema::drop('personal');
	}

}