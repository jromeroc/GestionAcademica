<?php

class Menu extends Eloquent {

    protected $table = 'menus';

    public function idMenu($control) 
    {
        
    	$submenu = $this->select('id')->where('url', '=', $control)->get()->toArray();
        return $submenu[0]['id'];
    }

    public function scopeSubmenu($query, $url)
    {
    	return $query->whereUrl($url);
    }

    public function informesMenu() {
        $resul = DB::table('menus')->get();
        return $resul;
    }
}