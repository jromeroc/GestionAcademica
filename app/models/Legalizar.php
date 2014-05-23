<?php

class Legalizar extends Eloquent
{

	public function srchMatriculasPendientes($tabla){
		$consulta = DB::table($tabla)
		->where('legalizada','=','0')
		->paginate(10);
		return $consulta;
	}

	public function srchMatriculasPendientesY_A($tabla,$name){
		$consulta = DB::table($tabla)
		->where('legalizada','=','0')
		->where($tabla.".names" , "LIKE" , '%'.$name.'%')
		->paginate(10);
		return $consulta;
	}


	public function srchMatriculasLegalizadas($tabla){
		$consulta = DB::table($tabla)
		->where('legalizada','=','1')
		->paginate(10);
		return $consulta;
	}

	public function srchMatriculasLegalizadasY_A($tabla,$name){
		$consulta = DB::table($tabla)
		->where('legalizada','=','1')
		->where($tabla.".names" , "LIKE" , '%'.$name.'%')
		->paginate(10);
		return $consulta;
	}
}