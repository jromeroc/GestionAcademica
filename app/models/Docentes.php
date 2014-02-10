<?php

class Docentes extends Eloquent
{
	protected $table = 'docentes';

	public function autocomplete($find)
	{
		
		$list_docente = DB::table('docentes')->select(DB::raw("CONCAT_WS(' ',nombres,pri_apellido,seg_apellido) as value, id"))
		->whereRaw("CONCAT_WS(' ',nombres,pri_apellido,seg_apellido) LIKE '%".$find."%'")
		->get();
		
		return $list_docente;
	}
}
		//$list_docente = DB::query('CONCAT_WS(" ",nombres,pri_apellido,seg_apellido) as value','id as id')->'where("CONCAT_WS(" ",nombres,pri_apellido,seg_apellido as value)","LIKE", "%".$find."%")')->get()->toArray();	
		//$list_docente = ('id as ID', "CONCAT_WS(' ', nombres , pri_apellido , seg_apellido) as value")->where('value', "LIKE", "%".Input::get('term')."%")->get()->toArray();

?>