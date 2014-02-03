<?php

class RoleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('roles')->delete();

        Roles::create(array(
            'nombre' => 'Administrador',
        ));
        Roles::create(array(
            'nombre' => 'Rector',
        ));
        Roles::create(array(
            'nombre' => 'Coordinador',
        ));
        Roles::create(array(
            'nombre' => 'Jefe de area',
        ));
        Roles::create(array(
            'nombre' => 'Docente',
        ));
        Roles::create(array(
            'nombre' => 'Secretaria de seecion'
        ));
        Roles::create(array(
            'nombre' => 'Secretaria academica',
        ));
        Roles::create(array(
            'nombre' => 'Contabilidad',
        ));
        Roles::create(array(
            'nombre' => 'Alumnos',
        ));

	}

}