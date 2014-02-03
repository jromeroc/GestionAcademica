<?php

class GrupoTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('grupos')->delete();

        Grupo::create(array(
            'id_grado'=>'1',
            'nombre'=>'Primero B',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'1',
            'nombre'=>'Primero C',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'2',
            'nombre'=>'Segundo',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'3',
            'nombre'=>'Tercero',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'4',
            'nombre'=>'Cuarto',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'5',
            'nombre'=>'Quinto',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'6',
            'nombre'=>'Sexto',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'7',
            'nombre'=>'Séptimo',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'8',
            'nombre'=>'Octavo',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'9',
            'nombre'=>'Noveno',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'10',
            'nombre'=>'Décimo',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'11',
            'nombre'=>'Undécimo',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'12',
            'nombre'=>'Jardín',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'13',
            'nombre'=>'Pre-jardín',
            'director'=>'1',
        ));

        Grupo::create(array(
            'id_grado'=>'14',
            'nombre'=>'Transición',
            'director'=>'1',
        ));
	}

}