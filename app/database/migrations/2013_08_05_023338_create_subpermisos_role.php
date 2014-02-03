<?php

use Illuminate\Database\Migrations\Migration;

class CreateSubpermisosRole extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('submenu_role', function($table){
			$table->integer('role');
			$table->integer('submenu');
			$table->integer('estado');
			$table->timestamps();
			$table->unique(array('role','submenu'));
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('submenu_role');
	}

}