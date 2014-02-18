<?php

class Alumnos extends Eloquent
{
	protected $table = 'alumnos';

	public function autocompletar($find)
	{

	}
	public function list_grupos($grupo)
	{
		$listaalum = DB::table('alumnos')->select(DB::raw("CONCAT_WS(' ',names,fname,lname) as value, id as id_alum"))
		->where('grupo', '=', $grupo)->get()->toArray();
		return $listaalum;
	}
}

?>