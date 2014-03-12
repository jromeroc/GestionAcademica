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
		$listCity = DB::table('ciudades')
			->where("nombre_ciudad","LIKE","'%".$find."%'")
			->where("id_pais_ciudad", "=" , $id_pais)
			->select("nombre_ciudad AS value , id_ciudad AS id")
		->get();
		return $listCity;
	}
}