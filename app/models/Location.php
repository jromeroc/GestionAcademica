<?php

class Location extends BaseController
{

	public function autocompletarpais($find)
	{
		$listPais = DB::table('paises')->select("name_pais AS value" , "id_pais AS id")
		->whereRaw("name_pais LIKE '%".$find."%'")
		->get();
		return $listPais;
	}

	public function autocompletarciudad($find,$id_pais)
	{
		$listCity = DB::table('ciudades')->select("nombre_ciudad AS value , id_ciudad AS id")
		->whereRaw("nombre_ciudad LIKE '%".$find."%'")
		->get();
		return $listCity;
	}
	public function autocompletarciudadU($find)
	{
		$listCity = DB::table('ciudades')->select("nombre_ciudad AS value , id_ciudad AS id")
		->whereRaw("nombre_ciudad LIKE '%".$find."%'")
		->get();
		return $listCity;
	}
}