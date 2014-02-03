<?php

class RoleController extends BaseController {

    public function index() {
        $roles= new Roles();
        $m = $roles->all()->lists('nombre', 'id');
        return $m;
    }

    public function listado() {
        $rol = new Roles();
        return View::make('roles.lista')->with('listado', $rol->get());
    }

    public function permisos($id) {
        $menu = new Menu();
        $role = new PermisosRole();
        $drole = Roles::where('id', '=', $id)->firstOrFail();
        return View::make('roles.listado')->with(array('menu' => $menu->informesMenu(), 'permisos' => $role->buscarPermisosRole($id), 'idrol' => $id, 'name' => $drole));
    }

    public function guardar() {
        $itemsForm = array_keys($_POST);
        $permiso_role = new PermisosRole();
        foreach ($itemsForm as $item) {
            if (substr($item, 0, 5) == "perm_") {
                $permiso = $_POST[$item];

                if ($permiso == 1) {
                    
                    $p_role = $permiso_role->whereRaw('role = ? and permiso = ? ', array($_POST['role'], substr($item, -1)))->get()->toArray();
                    
                    if (empty($p_role)) {
                        $permiso_role->role = $_POST['role'];
                        $permiso_role->permiso = substr($item, -1);
                        $permiso_role->save();
                    } else {
                        $permiso_role
                            ->where("permiso","=", substr($item, -1))
                            ->where("role", "=", $_POST['role'])->delete();
                    }
                }
                
            }
        }
    }

}

?>
