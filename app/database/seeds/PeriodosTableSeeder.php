<?php

class PeriodosTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('Periodos')->delete();

        User::create(array(
            'nombre_periodo'=>'Primer',
            'fechaini'=> 0,
            'fechafin'=> 0,
            'finperiodo'=> 0,
            'finlogros'=> 0,
        ));
        User::create(array(
            'nombre_periodo'=>'Segundo',
            'fechaini'=> 0,
            'fechafin'=> 0,
            'finperiodo'=> 0,
            'finlogros'=> 0,
        ));

        User::create(array(
            'nombre_periodo'=>'Tercer',
            'fechaini'=> 0,
            'fechafin'=> 0,
            'finperiodo'=> 0,
            'finlogros'=> 0,
        ));
	}

}