<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

        User::create(array(
            'nick'=>'admin',
            'password'=>Hash::make('123'),
            'role'=>'1',
            'type'=>'1',
            'active'=>'1',
        ));
        User::create(array(
            'nick'=>'admin2',
            'password'=>Hash::make('123'),
            'role'=> 1,
            'type'=> 1,
            'active'=> 0,
        ));

        User::create(array(
            'nick'=>'docente',
            'password'=>Hash::make('123'),
            'role'=> 1,
            'type'=> 1,
            'active'=> 1,
        ));
	}

}