<?php

use Illuminate\Database\Migrations\Migration;

class CreatePermisosUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permisos_user', function($table){
			$table->integer('user');
			$table->integer('permiso');
			$table->integer('estado');
			$table->timestamps();
			$table->unique(array('user','permiso'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permisos_user');
	}

}