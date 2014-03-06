<?php

class Alumnos extends Eloquent
{
	protected $table = 'alumnos';

	public function autocompletar($find)
	{
		$list_alum = $this->select(DB::raw("CONCAT_WS(' ',names,fname,lname) as value, id"))
		->whereRaw("CONCAT_WS(' ',names,fname,lname) LIKE '%".$find."%'")
		->get();
		
		return $list_alum;
	}
	public function listAlumGrupo($grupo)
	{
		$lista = $this->select(DB::raw("CONCAT_WS(' ',lname,fname,names) as value, id as id_alum"))
		->where('grupo', '=', $grupo)->orderBy('value', 'asc')->get();
		return $lista;
	}
}

?>