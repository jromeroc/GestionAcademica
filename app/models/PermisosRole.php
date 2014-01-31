<?php

class PermisosRole extends Eloquent
{
	 
	protected $table = 'permisos_role';
	
	public function permisoRole()
	{
		$permisos = $this->select('menus.name_item as item_name','menus.url as url','permisos_role.permiso as idmenu')
            	->join('menus', 'menus.id', '=', 'permisos_role.permiso')
                ->where('permisos_role.role','=', Session::get('role'))
                ->where('menus.estado', '=','1')->get()->toArray();
        return $permisos;
	}

	public function buscarPermisosRole($id) {
       $lista = $this->select('permisos_role.permiso')
                       ->where('role', '=', $id)->get()->toArray();
       return $lista;
   }

	public function accessUrl()
	{
		$permit = $this->permisoRole();
		
		foreach ($permit as $permiso) {
			if($permiso['url'] == Request::segment(1))
			{
				return true;
			}
		}
		return false;
	}

}
