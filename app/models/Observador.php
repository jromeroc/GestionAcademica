<?php

class Observador extends Eloquent
{
    protected $table = 'obsv_disciplinario';
    protected $fillable = array('fecha', 'id_docente','grupo','descripcion','id_obsv','id_alumno');
    public $errors;

    public function get_Id($fecha,$id_docente,$descripcion){
        $consulta = $this->select('id')
        ->where('id_docente','=',$id_docente)
        ->where('fecha','=',$fecha)
        ->where('descripcion','=',$descripcion)->get()->toArray();
        return $consulta;
    }

    public function save_map($observacion,$alumnos){
        DB::table('map_obs_academico')->insert
        (
            array('id_obsv' => $observacion, 'id_alumno' => $alumnos)
        );
    }

    //Enviar los datos al formulario de Editar
    /*
  	$listCargaAsign = $this->select('map_obs_academico.id_obsv as id_obsv','obsv_disciplinario.id as id-obsv')
		->join('map_carga','carga_academica.id','=','map_carga.id_carga')
		->join('grupos','carga_academica.grupo','=','grupos.id')->get()->toArray();
	*/


}                        