<?php

use Illuminate\Database\Migrations\Migration;

class CreateSubmenu extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('submenus', function($table){
			$table->increments('id')->unique();
			$table->string('id_menu');
			$table->string('name_item');
			$table->string('url');
			$table->boolean('estado');
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
		Schema::drop('submenus');
	}

}