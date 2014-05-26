<?php

class SubmenuTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('submenus')->delete();
        
        Submenu::create(array(
            'id_menu'=>'3',
            'name_item' => 'Administración',
            'url' => 'administracion',
            'estado' => '1'
        ));
        Submenu::create(array(
            'id_menu'=>'4',
            'name_item' => 'Nuevo',
            'url' => 'nuevo',
            'estado' => '1'
        ));
        Submenu::create(array(
            'id_menu'=>'4',
            'name_item' => 'Informe',
            'url' => 'informe',
            'estado' => '1'
        ));
        Submenu::create(array(
            'id_menu'=>'6',
            'name_item' => 'Legalizadas',
            'url' => 'legalizadas',
            'estado' => '1'
        ));
        Submenu::create(array(
            'id_menu'=>'6',
            'name_item' => 'Pendientes',
            'url' => 'pendientes',
            'estado' => '1'
        ));
        Submenu::create(array(
            'id_menu'=>'4',
            'name_item' => 'Control',
            'url' => 'informe',
            'estado' => '1'
        ));
        
    }

}