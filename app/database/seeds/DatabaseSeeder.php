<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('+++ Usuarios de prueba creados...!!!');

		$this->call('GradoTableSeeder');
		$this->command->info('+++ Grados creados...!!!');

		$this->call('GrupoTableSeeder');
		$this->command->info('+++ Grupos creados...!!!');

		$this->call('PermisosTableSeeder');
		$this->command->info('+++ Permisos Creados...!!!');
		
		$this->call('MenuTableSeeder');
		$this->command->info('+++ Menus Creados...!!!');

		$this->call('SubmenuTableSeeder');
		$this->command->info('+++ Submenus Creados...!!!');

		$this->call('RoleTableSeeder');
		$this->command->info('+++ Perfiles Creados...!!!');
	}

}