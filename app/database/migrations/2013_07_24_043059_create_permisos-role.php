<?php

use Illuminate\Database\Migrations\Migration;

class CreatePermisosRole extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permisos_role', function($table){
			$table->integer('role');
			$table->integer('permiso');
			$table->timestamps();
			$table->unique(array('role','permiso'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permisos_role');
	}

}