<?php

class Observador extends Eloquent
{

    protected $table = 'obsv_disciplinario';
    
    protected $fillable = array('fecha', 'id_docente','grupo','descripcion');

    public $errors;
    
    //Enviar los datos al formulario de Editar
    /*
  	$listCargaAsign = $this->select('map_obs_academico.id_obsv as id_obsv','obsv_disciplinario.id as id-obsv')
		->join('map_carga','carga_academica.id','=','map_carga.id_carga')
		->join('grupos','carga_academica.grupo','=','grupos.id')->get()->toArray();
	*/
}