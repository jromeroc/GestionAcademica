<?php

class Matriculas extends Eloquent
{

	public function autoComplete($alum,$year)
	{	
		switch ($year) 
		{
    		
    		case ($year = date('Y'))&&(date('m')<=7):
		        $tabla = "alumnos";
		        break;
    		case $year < date('Y'):
		        $tabla = "alumnos_last";
		        break;
    		case ($year > date('Y'))&&(date('m')>=8):
		        $tabla = "alumnos_next";
		        break;
		}

		$colsult = DB::table($tabla)->select(DB::raw("CONCAT_WS(' ',ape1_alum,ape2_alum,seg_apellido) as value, id_alum"))
		->whereRaw("CONCAT_WS(' ',ape1_alum,ape2_alum,seg_apellido) LIKE '%".$alum."%'")
		->get();
		return $list_alum;
	}

}
?>