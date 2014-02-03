<?php

class Submenu extends Eloquent {

    protected $table = 'submenus';

    public function informeSubmenu() {
        $submenulist = $this->select('menus.id as id_menu', 'menus.name_item as name_menu','submenus.id  as id_submenu',
                'submenus.name_item as name_submenu','submenus.url', 'submenus.estado','submenus.created_at')
                ->join('menus', 'submenus.id_menu', '=', 'menus.id')->get()->toArray();
        return $submenulist;
    }

    public function filterlist($idmenu)
    {
    	$list = $this->where('id_menu', '=', $idmenu)->get()->toArray();
    	return $list;
    }
}