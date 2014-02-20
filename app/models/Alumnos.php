<?php

class Alumnos extends Eloquent
{
	protected $table = 'alumnos';

	public function autocompletar($find)
	{

	}
	public function listAlumGrupo($grupo)
	{
		$lista = $this->select(DB::raw("CONCAT_WS(' ',lname,fname,names) as value, id as id_alum"))
		->where('grupo', '=', $grupo)->orderBy('value', 'asc')->get();
		return $lista;
	}
}

?>