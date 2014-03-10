<?php

class PermisosTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('permisos_role')->delete();

        PermisosRole::create(array(
            'role'=>'1',
            'permiso'=>'1',
        ));
       PermisosRole::create(array(
            'role'=>'1',
            'permiso'=>'2',
        ));
       PermisosRole::create(array(
            'role'=>'1',
            'permiso'=>'3',
        ));
       PermisosRole::create(array(
            'role'=>'1',
            'permiso'=>'4',
        ));
       PermisosRole::create(array(
            'role'=>'1',
            'permiso'=>'5',
        ));
	}

}