<?php

class Alumnos extends Eloquent
{
	protected $table = 'alumnos';

	public function autocompletar($find)
	{

	}
	public function listAlumGrupo($grupo)
	{
		$lista = $this->select(DB::raw("CONCAT_WS(' ',names,fname,lname) as value, id as id_alum"))
		->where('grupo', '=', $grupo)->get();
		return $lista;
	}
}

?>