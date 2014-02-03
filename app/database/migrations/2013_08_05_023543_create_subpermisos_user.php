<?php

use Illuminate\Database\Migrations\Migration;

class CreateSubpermisosUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('submenu_user', function($table){
			$table->integer('user');
			$table->integer('submenu');
			$table->integer('estado');
			$table->timestamps();
			$table->unique(array('user','submenu'));
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('submenu_user');
	}

}