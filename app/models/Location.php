<?php

class Location extends BaseController
{
	public function autoCompletepais($pais)
	{	
		$consult = DB::table('paises')->select("name_pais as value, id_pais as id")
		->whereRaw("name_pais LIKE '%".$pais."%'")
		->get();
		return $consult;
	}

	public function autoCompleteciudad($city)
	{	
		$consult = DB::table('ciudades')->select("nombre_ciudad as value, id_pais_ciudad as idpais, id_ciudad as id")
		->whereRaw("nombre_ciudad LIKE '%".$city."%'")
		->get();
		return $consult;
	}
}