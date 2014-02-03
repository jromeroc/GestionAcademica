<?php

class MenuTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run() {

        DB::table('menus')->delete();
        
        Menu::create(array(
            'name_item' => 'Administración',
            'url' => 'administracion',
            'estado' => '1'
        ));
        Menu::create(array(
            'name_item' => 'Carga Académica',
            'url' => 'carga_academica',
            'estado' => '1'
        ));
        Menu::create(array(
            'name_item' => 'Logros',
            'url' => 'logros',
            'estado' => '1'
        ));
         Menu::create(array(
            'name_item' => 'Observador',
            'url' => 'observador',
            'estado' => '1'
        ));
    }

}