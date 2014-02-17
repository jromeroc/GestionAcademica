<?php

use Illuminate\Database\Migrations\Migration;

class CreatePeriodos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('periodos', function($table){
				$table->increments('id');
				$table->string('nombre_periodo');
				$table->date('fechaini');
				$table->date('fechafin');
				$table->date('finperiodo');
				$table->date('finlogros');
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
		Schema::drop('periodos');
	}

}