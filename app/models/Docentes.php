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
		

?>