<?php

use Illuminate\Database\Migrations\Migration;

class CreateTipoDocumentos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipo_documento', function($table){
			$table->increments('id')->unique();
			$table->string('name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tipo_documento');
	}

}