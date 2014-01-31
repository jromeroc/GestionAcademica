<?php

use Illuminate\Database\Migrations\Migration;

class CreateMenu extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function($table){
			$table->increments('id')->unique();
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
		Schema::drop('menus');
	}

}