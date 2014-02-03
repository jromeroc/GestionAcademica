<?php

use Illuminate\Database\Migrations\Migration;

class CreateLogros extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logros', function($table){
			$table->increments('id');
			$table->integer('id_carga');
			$table->integer('orden');
			$table->integer('periodo');
			$table->text('descripcion');
			$table->integer('user_edit');
			$table->date('date_edit');
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
		Schema::drop('logros');
	}

}