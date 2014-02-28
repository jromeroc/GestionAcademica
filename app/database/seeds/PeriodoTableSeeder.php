<?php

class PeriodoTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('periodos')->delete();

        Periodos::create(array(
            'nombre_periodo'=>'Primer',
            'fechaini'=> '0',
            'fechafin'=> '0',
            'finperiodo'=> '0',
            'finlogros'=> '0'
        ));
        Periodos::create(array(
            'nombre_periodo'=>'Segundo',
            'fechaini'=> '0',
            'fechafin'=> '0',
            'finperiodo'=> '0',
            'finlogros'=> '0'
        ));

        Periodos::create(array(
            'nombre_periodo'=>'Tercer',
            'fechaini'=> '0',
            'fechafin'=> '0',
            'finperiodo'=> '0',
            'finlogros'=> '0'
        ));
	}

}