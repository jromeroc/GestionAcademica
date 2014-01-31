<?php

class SubmenuController extends BaseController {

    public function index() {
        return View::make('submenus.index');
    }

    public function nuevo() {
        $menu = new Menu();
        $m = $menu->all()->lists('name_item', 'id');
        return View::make('submenus.nuevo')->with(array('menus' => $m));
    }

    public function guardar() {
        $guarda = new Submenu();
        $guarda->id_menu = Input::get('menu');
        $guarda->name_item = Input::get('nombre');
        $guarda->url = Input::get('url');
        $guarda->estado = 1;
        $guarda->save();
        return Redirect::to('submenu/listar');
    }

    public function listar() {
        $menu = new Submenu();
        $m = $menu->informeSubmenu();
        return View::make('submenus.listar')->with('listado', $m);
    }

    public function editar($id) {
        $submenu = new Submenu();
        $info = $submenu->where('id', '=', $id)->first()->toArray();
        $menu = new Menu();
        $m = $menu->all()->lists('name_item', 'id');
        return View::make('submenus.editar')->with( array('menu' => $m,'info' => $info));
    }

    public function save() {
        $submenu = new Submenu();
        $submenu = DB::table('submenus')
                ->where('id', Input::get('id'))
                ->update(array('id_menu' => Input::get('menus'),'name_item' => Input::get('nombre'), 'url' => Input::get('url'), 'estado' => Input::get('estado')));
        return Redirect::to('submenu/listar');
    }

}

?>