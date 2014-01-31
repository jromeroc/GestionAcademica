<?php

class GradoTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('grados')->delete();
        
        Grado::create(array(
            'nombre'=>'Primero',
            'seccion'=> '2'
        ));

        Grado::create(array(
            'nombre'=>'Segundo',
            'seccion'=> '1'
        ));

        Grado::create(array(
            'nombre'=>'Tercero',
            'seccion'=> '1'
        ));

        Grado::create(array(
            'nombre'=>'Cuarto',
            'seccion'=> '1'
        ));

        Grado::create(array(
            'nombre'=>'Quinto',
            'seccion'=> '1'
        ));

        Grado::create(array(
            'nombre'=>'Sexto',
            'seccion'=> '3'
        ));

        Grado::create(array(
            'nombre'=>'Séptimo',
            'seccion'=> '3'
        ));

        Grado::create(array(
            'nombre'=>'Octavo',
            'seccion'=> '3'
        ));

        Grado::create(array(
            'nombre'=>'Noveno',
            'seccion'=> '3'
        ));

        Grado::create(array(
            'nombre'=>'Décimo',
            'seccion'=> '3'
        ));

        Grado::create(array(
            'nombre'=>'Undécimo',
            'seccion'=> '3'
        ));

        Grado::create(array(
            'nombre'=>'Jardín',
            'seccion'=> '1'
        ));

        Grado::create(array(
            'nombre'=>'Pre-jardín',
            'seccion'=> '1'
        ));

        Grado::create(array(
            'nombre'=>'Transición',
            'seccion'=> '1'
        ));
	}

}