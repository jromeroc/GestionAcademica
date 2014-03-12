<?php

class Matriculas extends Eloquent
{
	protected $fillable = array('', '','','','','');
	public function autoCompletename($alum,$year)
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

		$consult = DB::table($tabla)->select(DB::raw("CONCAT_WS(' ',lname,fname,names) as value, id"))
		->whereRaw("CONCAT_WS(' ',lname,fname,names) LIKE '%".$alum."%'")
		->get();
		return $consult;
	}
	
}
?>