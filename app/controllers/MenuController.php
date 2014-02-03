<?php

class MenuController extends BaseController {

    public function index() {
        return View::make('menus.index');
    }

    public function informes() {
        $menu = new Menu();
        return View::make('menus.listar')->with('listado', $menu->informesMenu());
    }

    public function nuevo() {
        return View::make('menus.nuevo');
    }

    public function guardar() {
        $menu = new Menu();
        $menu->name_item = Input::get('nombre');
        $menu->url = Input::get('url');
        $menu->estado = 1;
        $menu->save();
        return Redirect::to('menu/informes');
    }

    public function editar($id) {
        $menu = new Menu();
        $info = $menu->where('id', '=', $id)->first()->toArray();
        return View::make('menus.editar')->with('info', $info);
    }

    public function save() {
        $menu = new Menu();
        $menu = DB::table('menus')
                ->where('id', Input::get('id'))
                ->update(array('name_item' => Input::get('nombre'), 'url' => Input::get('url'), 'estado' => Input::get('estado')));
        return Redirect::to('menu/informes');
    }

}